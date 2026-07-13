<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_id',
        'method',
        'phone_number',
        'amount',
        'currency',
        'transaction_ref',
        'status',
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
