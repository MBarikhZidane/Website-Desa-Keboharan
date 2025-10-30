<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dusun extends Model
{
    protected $fillable = ['name', 'total_perempuan', 'total_pria', 'total_kepalakeluarga'];
}
