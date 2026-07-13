<?php

use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Room::class)->constrained()->restrictOnUpdate()->restrictOnDelete();
            $table->integer('duration_of_stay');
            $table->string('check_in');
            $table->string('check_out');
            $table->string('total_price');
            $table->boolean('status');
            $table->foreignIdFor(User::class)
            ->constrained()
            ->restrictOnUpdate()
            ->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
