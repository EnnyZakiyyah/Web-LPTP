<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjaman extends Model
{
    use HasFactory,  Sluggable;
    protected $table = 'peminjamans';   //karena resource ngedetect peminjamens
    protected $guarded = ['id'];

    public function users(){
        return $this->belongsTo(User::class, 'id_peminjam');
    }

    public function petugas(){
        return $this->belongsTo(User::class, 'id_petugas');
    }

    public function katalogs(){
        return $this->belongsTo(Katalog::class, 'id_buku');
    }

    public function status(){
        return $this->belongsTo(Status::class, 'id_status');
    }

    public function lokasi(){
        return $this->belongsTo(Lokasi::class, 'id_lokasi');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'no_peminjaman'
            ]
        ];
    }
}
