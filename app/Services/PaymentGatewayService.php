<?php

namespace App\Services;

use Illuminate\Support\Str;

/**
 * Service d'abstraction du paiement.
 *
 * Pour l'instant ce service SIMULE la réponse d'un opérateur (Orange Money,
 * MTN Mobile Money, carte bancaire...) car aucune clé API n'a été fournie.
 *
 * Pour brancher un vrai fournisseur plus tard, il suffit de remplacer le
 * contenu de la méthode charge() par l'appel HTTP réel vers l'API du
 * fournisseur (ex: CinetPay, Fapshi, Orange Money API, MTN MoMo API,
 * Stripe...), en gardant la même signature de retour.
 *
 * Les identifiants (clés API, merchant id, etc.) sont à placer dans le
 * fichier .env puis lus via config('services.<fournisseur>.<cle>')
 * (voir config/services.php).
 */
class PaymentGatewayService
{
    /**
     * Déclenche un paiement.
     *
     * @param  string  $method  orange_money|mtn_money|carte|especes
     * @param  float   $amount
     * @param  string|null  $phoneNumber
     * @return array{success: bool, transaction_ref: string, message: string}
     */
    public function charge(string $method, float $amount, ?string $phoneNumber = null): array
    {
        $transactionRef = strtoupper(Str::random(4)).'-'.now()->format('YmdHis').'-'.strtoupper(Str::random(4));

        // ---------------------------------------------------------------
        // TODO (intégration réelle) :
        //
        // if ($method === 'orange_money') {
        //     return $this->chargeOrangeMoney($amount, $phoneNumber, $transactionRef);
        // }
        // if ($method === 'mtn_money') {
        //     return $this->chargeMtnMomo($amount, $phoneNumber, $transactionRef);
        // }
        // if ($method === 'carte') {
        //     return $this->chargeCard($amount, $transactionRef);
        // }
        // ---------------------------------------------------------------

        // Paiement "especes" (paiement à la réception) : toujours considéré
        // en attente tant que la réceptionniste n'a pas encaissé sur place.
        if ($method === 'especes') {
            return [
                'success' => true,
                'transaction_ref' => $transactionRef,
                'message' => 'Paiement à régler en espèces à la réception.',
            ];
        }

        // Simulation : le paiement mobile/carte réussit dans la grande
        // majorité des cas, pour permettre de tester le parcours complet.
        $success = true;

        return [
            'success' => $success,
            'transaction_ref' => $transactionRef,
            'message' => $success
                ? 'Paiement accepté.'
                : 'Le paiement a échoué, veuillez réessayer.',
        ];
    }
}
