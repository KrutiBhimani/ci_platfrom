<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Mission_media extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table='mission_media';
    protected $primaryKey = 'mission_media';
    protected $fillable = [
        'mission_id',
        'media_name',
        'media_type',
        'media_path',
    ];

}