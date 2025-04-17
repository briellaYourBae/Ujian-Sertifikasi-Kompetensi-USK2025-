<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $guarded = [];

    public function peminjams()
    {
        return $this->hasMany(Peminjam::class, 'anggota_id', 'anggota_id');
    }
}