<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $guarded = [];

    public function bukus()
    {
        return $this->hasMany(Buku::class, 'kategori_id', 'kategori_id');
    }
}