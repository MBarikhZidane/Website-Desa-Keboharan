<?php

namespace App\Models;

use App\Models\Agama;
use Illuminate\Database\Eloquent\Model;

class Pemelukagama extends Model
{
    protected $fillable = ['agama_id', 'jumlah'];

    public function agama()
    {
        return $this->belongsTo(Agama::class, 'agama_id');
    }
}
