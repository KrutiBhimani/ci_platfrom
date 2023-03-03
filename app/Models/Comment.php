<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Comment extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table='comment';
    protected $primaryKey = 'comment_id';
    protected $fillable = [
        'user_id',
        'mission_id',
        'comment_text',
        'approval_status'
    ];

}