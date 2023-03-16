<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Contact extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table='contact';
    protected $primaryKey = 'contact_id';
    protected $fillable = [
        'subject',
        'message',
        'user_id',
    ];

}