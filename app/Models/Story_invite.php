<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Story_invite extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table='story_invite';
    protected $primaryKey = 'story_invite_id';
    protected $fillable = [
        'from_user_id',
        'to_user_id',
        'story_id',
    ];

}