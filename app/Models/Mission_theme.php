<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Mission_theme extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'mission_theme';
    protected $primaryKey = 'mission_theme_id';
    protected $fillable = [
        'title',
        'status',
        'mission_theme_id'
    ];

}