<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Mission_document extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'mission_document';
    protected $primaryKey = 'mission_document_id';
    protected $fillable = [
        'mission_id',
        'document_name',
        'document_type',
        'document_path',
    ];

}