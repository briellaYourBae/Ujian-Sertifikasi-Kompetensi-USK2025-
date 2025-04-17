<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $guarded = [];

    public function peminjams()
    {
        return $this->hasMany(Peminjam::class, 'petugas_id', 'petugas_id');
    }
}