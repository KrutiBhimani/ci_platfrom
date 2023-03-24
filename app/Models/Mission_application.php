<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Mission_application extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'mission_application';
    protected $primaryKey = 'mission_application_id';
    protected $fillable = [
        'user_id',
        'mission_id',
        'applied_at',
        'approval_status'
    ];

}