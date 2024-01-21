<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReservationsAddons extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_id',
        'addon_id',
        'price',
    ];

    public function Reservation()
    {
        return $this->belongsTo(Reservations::class);
    }

    public function Addon()
    {
        return $this->belongsTo(Addons::class);
    }
}
