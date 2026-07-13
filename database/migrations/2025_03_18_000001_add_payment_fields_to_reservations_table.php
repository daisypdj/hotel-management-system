<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Ajout des champs nécessaires au suivi du paiement et à la validation
 * par la réceptionniste (scan du QR code), sans toucher à la table
 * "reservations" existante.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            // en_attente -> le client n'a pas encore payé
            // paye       -> le client a payé, le QR code est généré et affiché
            // valide     -> la réceptionniste a scanné le QR code et confirmé le paiement
            // echoue     -> le paiement a échoué
            $table->string('payment_status')->default('en_attente')->after('status');

            // orange_money, mtn_money, carte, especes...
            $table->string('payment_method')->nullable()->after('payment_status');

            // Jeton unique encodé dans le QR code affiché au client
            $table->string('qr_token', 64)->nullable()->unique()->after('payment_method');

            $table->timestamp('paid_at')->nullable()->after('qr_token');

            $table->foreignIdFor(User::class, 'validated_by')
                ->nullable()
                ->after('paid_at')
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamp('validated_at')->nullable()->after('validated_by');
        });
    }

    public function down(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropConstrainedForeignId('validated_by');
            $table->dropColumn([
                'payment_status',
                'payment_method',
                'qr_token',
                'paid_at',
                'validated_at',
            ]);
        });
    }
};
