<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Story extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table='story';
    protected $primaryKey = 'story_id';
    protected $fillable = [
        'user_id',
        'mission_id',
        'title',
        'description',
        'status',
        'published_at',
        'story_id'
    ];

}