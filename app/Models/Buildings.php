<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Buildings extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'address',
    ];

    public function Rooms(): HasMany
    {
        return $this->hasMany(Rooms::class);
    }

    public function Reservations(): HasMany
    {
        return $this->hasMany(Reservations::class);
    }
}
