<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogCheck extends Model
{
    protected $fillable = ['name', 'address', 'luas', 'fasilitas', 'price'];
}
