<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;
    public function venues(){
        return $this->hasMany(Venue::class);
    }

    public function dresses(){
        return $this->hasMany(Dress::class);
    }
}
