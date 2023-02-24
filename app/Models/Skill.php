<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Skill extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table='skill';
    protected $primaryKey = 'skill_id';
    protected $fillable = [
        'skill_name',
        'status'
    ];

}