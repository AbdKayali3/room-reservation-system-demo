<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Addons extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'price',
    ];


    public function Reservations()
    {
        return $this->belongsToMany(Reservations::class, 'reservations_addons');
    }
}
