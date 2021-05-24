<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelada extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_name','date', 'hours', 'local','updated_at','created_at','creator',
    ];

}
