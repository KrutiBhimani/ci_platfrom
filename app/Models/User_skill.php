<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class User_skill extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'user_skill';
    protected $primaryKey = 'user_skill_id';
    protected $fillable = [
        'user_id',
        'skill_id',
    ];

}