<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPelada extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','pelada_id','status','ativo'
    ];
}
