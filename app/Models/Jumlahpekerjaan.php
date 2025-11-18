<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jumlahpekerjaan extends Model
{
    protected $fillable = ['pekerjaan_id', 'jumlah'];

    public function jenispekerjaan()
    {
        return $this->belongsTo(Jenispekerjaan::class, 'pekerjaan_id');
    }
}
