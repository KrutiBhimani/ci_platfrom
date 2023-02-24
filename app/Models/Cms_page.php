<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Cms_page extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table='cms_page';
    protected $primaryKey = 'cms_page_id';
    protected $fillable = [
        'title',
        'description',
        'slug',
        'status'
    ];

}