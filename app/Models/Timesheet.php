<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Timesheet extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'timesheet';
    protected $primaryKey = 'timesheet_id';
    protected $fillable = [
    ];

}