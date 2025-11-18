<?php

namespace App\Models;

use App\Models\Jumlahpekerjaan;
use Illuminate\Database\Eloquent\Model;

class Jenispekerjaan extends Model
{
    protected $fillable = ['name'];

    public function jumlahpekerjaans()
    {
        return $this->hasMany(Jumlahpekerjaan::class, 'pekerjaan_id');
    }
}
