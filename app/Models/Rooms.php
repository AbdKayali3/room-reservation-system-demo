<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Rooms extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'building_id',
        'space',
        'default_price',
    ];

    public function building()
    {
        return $this->belongsTo(Buildings::class);
    }

    public function Seasons()
    {
        return $this->belongsToMany(Seasons::class, 'seasons_rooms', 'room_id', 'season_id');
    }
    
    public function SeasonsRooms()
    {
        return $this->hasMany(SeasonsRooms::class, 'room_id');
    }
}
