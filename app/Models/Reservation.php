<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations';
    use HasFactory;

    public function user(){
    return $this->belongsTo(User::class);
    }

    public function car(){
        return $this->belongsTo(Car::class);
        }

    public function protection(){
        return $this->belongsTo(Protection::class);
    }

    public function options(){
        return $this->belongsToMany(Option::class);
    }

}
