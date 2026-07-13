<?php

namespace App\Http\Controllers\Receptionniste;

use App\Models\Room;
use App\Models\Hotel;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Tableau de bord de la réceptionniste : scanner + dernières validations.
     */
    public function index()
    {
        $recentValidations = Reservation::where('payment_status', 'valide')
            ->orderByDesc('validated_at')
            ->limit(10)
            ->get();

        $enAttenteCount = Reservation::where('payment_status', 'paye')->count();
        $valideAujourdhui = Reservation::where('payment_status', 'valide')
            ->whereDate('validated_at', now()->toDateString())
            ->count();

        return view('receptionniste.dashboard', compact('recentValidations', 'enAttenteCount', 'valideAujourdhui'));
    }

    /**
     * Appelé en AJAX quand la caméra détecte un QR code.
     * Le contenu du QR code est simplement le "qr_token" de la réservation.
     */
    public function validateQr(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
        ]);

        $reservation = Reservation::where('qr_token', $request->token)->first();

        if (! $reservation) {
            return response()->json([
                'success' => false,
                'message' => "Ce QR code ne correspond à aucune réservation.",
            ], 404);
        }

        if ($reservation->payment_status === 'valide') {
            return response()->json([
                'success' => false,
                'already' => true,
                'message' => 'Ce paiement a déjà été validé le '.optional($reservation->validated_at)->format('d/m/Y à H:i').'.',
            ]);
        }

        if ($reservation->payment_status !== 'paye') {
            return response()->json([
                'success' => false,
                'message' => "Le paiement de cette réservation n'a pas encore été effectué par le client.",
            ], 422);
        }

        $reservation->update([
            'payment_status' => 'valide',
            'validated_by' => auth()->id(),
            'validated_at' => now(),
        ]);

        $room = Room::find($reservation->room_id);
        $hotel = $room ? Hotel::find($room->hotel_id) : null;

        return response()->json([
            'success' => true,
            'message' => 'Paiement validé avec succès.',
            'reservation' => [
                'id' => $reservation->id,
                'client' => optional($reservation->user)->name,
                'hotel' => $hotel->hotel_name ?? '—',
                'chambre' => $room->Room_profile ?? '—',
                'montant' => $reservation->total_price,
                'check_in' => $reservation->check_in,
                'check_out' => $reservation->check_out,
            ],
        ]);
    }
}
