<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Mission_skill extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'mission_skill';
    protected $primaryKey = 'mission_skill_id';
    protected $fillable = [
        'mission_id',
        'skill_id',
    ];
}