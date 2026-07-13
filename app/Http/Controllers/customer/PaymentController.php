<?php

namespace App\Http\Controllers\customer;

use App\Models\Room;
use App\Models\Hotel;
use App\Models\Payment;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Services\PaymentGatewayService;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    /**
     * Étape 1 : le client choisit son moyen de paiement.
     */
    public function choose(Reservation $reservation)
    {
        abort_if($reservation->user_id !== auth()->id(), 403);

        $room = Room::find($reservation->room_id);
        $hotel = $room ? Hotel::find($room->hotel_id) : null;

        return view('customer.payment-select', compact('reservation', 'room', 'hotel'));
    }

    /**
     * Étape 2 : traitement du paiement puis génération du QR code.
     */
    public function process(Request $request, Reservation $reservation, PaymentGatewayService $gateway)
    {
        abort_if($reservation->user_id !== auth()->id(), 403);

        $request->validate([
            'method' => 'required|in:orange_money,mtn_money,carte,especes',
            'phone_number' => 'nullable|string|max:20',
        ]);

        $result = $gateway->charge(
            $request->method,
            (float) $reservation->total_price,
            $request->phone_number
        );

        Payment::create([
            'reservation_id' => $reservation->id,
            'method' => $request->method,
            'phone_number' => $request->phone_number,
            'amount' => $reservation->total_price,
            'currency' => 'XAF',
            'transaction_ref' => $result['transaction_ref'],
            'status' => $result['success'] ? 'reussi' : 'echoue',
        ]);

        if (! $result['success']) {
            return back()->with('payment_error', $result['message']);
        }

        // Paiement en espèces : pas de QR code de validation à distance,
        // le client réglera et sera validé directement par la réceptionniste.
        $reservation->update([
            'payment_method' => $request->method,
            'payment_status' => 'paye',
            'qr_token' => Str::random(40),
            'paid_at' => now(),
        ]);

        return to_route('customer.payment.qrcode', $reservation->id);
    }

    /**
     * Étape 3 : affichage du QR code que la réceptionniste doit scanner.
     */
    public function showQr(Reservation $reservation)
    {
        abort_if($reservation->user_id !== auth()->id(), 403);

        $room = Room::find($reservation->room_id);
        $hotel = $room ? Hotel::find($room->hotel_id) : null;

        return view('customer.payment-qrcode', compact('reservation', 'room', 'hotel'));
    }

    /**
     * Utilisé en AJAX par la page QR code pour savoir si la réceptionniste
     * vient de valider le paiement (mise à jour en temps réel côté client).
     */
    public function status(Reservation $reservation)
    {
        abort_if($reservation->user_id !== auth()->id(), 403);

        return response()->json([
            'payment_status' => $reservation->payment_status,
            'validated_at' => optional($reservation->validated_at)->format('d/m/Y H:i'),
        ]);
    }
}
