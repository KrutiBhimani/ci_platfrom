<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Time_mission extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table='time_mission';
    protected $primaryKey = 'time_mission';
    protected $fillable = [
    ];

}