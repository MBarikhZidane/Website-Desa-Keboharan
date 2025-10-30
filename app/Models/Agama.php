<?php

namespace App\Models;

use App\Models\Pemelukagama;
use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    protected $fillable = ['name'];

    public function pemelukagamas()
    {
        return $this->hasMany(Pemelukagama::class, 'agama_id');
    }
}
