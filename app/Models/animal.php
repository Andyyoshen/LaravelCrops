<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class animal extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id_account',
        'username',
        'password',
    ];
}