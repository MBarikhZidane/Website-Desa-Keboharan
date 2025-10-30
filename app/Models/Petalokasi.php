<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Petalokasi extends Model
{
    protected $fillable = ['utara', 'selatan', 'timur', 'barat', 'luas_desa'];
}
