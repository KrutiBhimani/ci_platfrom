<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Mission_invite extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table='mission_invite';
    protected $primaryKey = 'mission_invite_id';
    protected $fillable = [
        'from_user_id',
        'to_user_id',
        'mission_id',
    ];

}