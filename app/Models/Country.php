<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Country extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table='country';
    protected $primaryKey = 'country_id';
    protected $fillable = [
        'name',
        'country_id'
    ];

}
