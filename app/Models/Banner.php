<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Banner extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'banner';
    protected $primaryKey = 'banner_id';
    protected $fillable = [
        'title',
        'text',
        'sort_order',
        'image'
    ];

}