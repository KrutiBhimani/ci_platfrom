<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class City extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table='city';
    protected $primaryKey = 'city_id';
    protected $fillable = [
        'name',
        'city_id',
        'country_id'
    ];

}