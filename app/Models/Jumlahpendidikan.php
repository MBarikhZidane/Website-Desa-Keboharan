<?php

namespace App\Models;

use App\Models\Jenispendidikan;
use Illuminate\Database\Eloquent\Model;

class Jumlahpendidikan extends Model
{
    protected $fillable = ['pendidikan_id', 'jumlah'];

    public function jenispendidikan()
    {
        return $this->belongsTo(Jenispendidikan::class, 'pendidikan_id');
    }
}
