<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Story_media extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table='story_media';
    protected $primaryKey = 'story_media_id';
    protected $fillable = [
    ];

}