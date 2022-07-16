<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function peminjamans(){
        return $this->hasMany(Peminjaman::class, 'id_kondisi');
    }
}
