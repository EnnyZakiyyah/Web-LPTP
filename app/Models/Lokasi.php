<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function katalogs(){
        return $this->hasMany(Katalog::class);
    }

    public function peminjamans(){
        return $this->hasMany(Peminjaman::class);
    }

    public function bibliographies(){
        return $this->hasMany(Bibliography::class);
    }
}
