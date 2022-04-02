<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class crops extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'SerialNumber',
        'ManuFacturer',
        'Author',
        'Price',
        'OutDate'
    ];
}
