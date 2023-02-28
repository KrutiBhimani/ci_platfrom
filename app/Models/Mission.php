<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Mission extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table='mission';
    protected $primaryKey = 'mission_id';
    protected $fillable = [
        'mission_id',
        'title',
        'short_description',
        'description',
        'city_id',
        'country_id',
        'organization_name',
        'organization_detail',
        'start_date',
        'end_date',
        'mission_type',
        'theme_id',
        'availability',
    ];

}