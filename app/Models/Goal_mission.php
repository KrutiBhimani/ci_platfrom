<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Goal_mission extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table='goal_mission';
    protected $primaryKey = 'goal_mission_id';
    protected $fillable = [
        'goal_objective_text',
        'goal_value',
        'mission_id',
    ];

}