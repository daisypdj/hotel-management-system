<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable=[
        'room_id','check_in','check_out','duration_of_stay','total_price','user_id','status',
        'payment_status','payment_method','qr_token','paid_at','validated_by','validated_at',
    ];

    protected $casts = [
        'paid_at' => 'datetime',
        'validated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
