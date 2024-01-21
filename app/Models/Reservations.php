<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Reservations extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'building_id',
        'room_id',
        'start_date',
        'end_date',
        'duration',
        'duration_price',
        'total_price',
    ];

    public function Building(): BelongsTo
    {
        return $this->belongsTo(Buildings::class);
    }

    public function Room(): BelongsTo
    {
        return $this->belongsTo(Rooms::class);
    }

    public function Addons(): BelongsToMany
    {
        return $this->belongsToMany(Addons::class, 'reservations_addons');
    }


}
