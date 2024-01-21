<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SeasonsRooms extends Model
{
    use HasFactory;

    protected $fillable = [
        'season_id',
        'room_id',
        'price',
    ];
    
    public function Season()
    {
        return $this->belongsTo(Seasons::class);
    }

    public function Room()
    {
        return $this->belongsTo(Rooms::class);
    }

}