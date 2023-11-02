<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'cars';

    //pour lier avec Reservation : 
    public function reservations(){

        return $this->hasMany(Reservation::class, 'idCar', 'id');
    }


    use HasFactory;
}
