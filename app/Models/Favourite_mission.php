<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Favourite_mission extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table='favourite_mission';
    protected $primaryKey = 'favourite_mission_id';
    protected $fillable = [
        'user_id',
        'mission_id'
    ];

}