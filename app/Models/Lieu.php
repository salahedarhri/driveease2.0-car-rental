<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lieu extends Model
{
    protected $table = 'lieux';

    use HasFactory;

    // public static function search($search){
    //     return static::where('ville', 'LIKE', "%{$search}%")
    //                 ->orWhere('nom', 'LIKE', "%{$search}%")
    //                 ->get();
    // }
}
