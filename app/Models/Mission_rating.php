<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Mission_rating extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table='mission_rating';
    protected $primaryKey = 'mission_rating_id';
    protected $fillable = [
    ];

}