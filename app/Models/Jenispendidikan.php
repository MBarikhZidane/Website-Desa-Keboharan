<?php

namespace App\Models;

use App\Models\Jumlahpendidikan;
use Illuminate\Database\Eloquent\Model;

class Jenispendidikan extends Model
{
    protected $fillable = ['name'];

    public function jumlahpendidikans()
    {
        return $this->hasMany(Jumlahpendidikan::class, 'pendidikan_id');
    }
}
