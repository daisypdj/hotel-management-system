<?php

use App\Models\Reservation;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Reservation::class)->constrained()->cascadeOnDelete();
            $table->string('method'); // orange_money, mtn_money, carte, especes
            $table->string('phone_number')->nullable();
            $table->decimal('amount', 12, 2);
            $table->string('currency')->default('XAF');
            $table->string('transaction_ref')->unique();
            $table->string('status')->default('reussi'); // reussi, echoue, en_attente
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
