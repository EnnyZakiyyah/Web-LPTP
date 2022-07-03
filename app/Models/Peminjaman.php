<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Peminjaman extends Model
{
    use SoftDeletes;
    use HasFactory,  Sluggable;
    protected $table = 'peminjamans';   //karena resource ngedetect peminjamens
    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%')
                     ->orWhere('body', 'like', '%' . $search . '%') ;
        });
    }

    public function users(){
        return $this->belongsTo(User::class, 'id_peminjam');
    }

    public function petugas(){
        return $this->belongsTo(User::class, 'id_petugas');
    }

    public function katalogs(){
        return $this->belongsTo(Katalog::class, 'id_buku');
    }

    public function koleksidigitals(){
        return $this->hasMany(Koleksidigital::class);
    }

    public function status(){
        return $this->belongsTo(Status::class, 'id_status');
    }

    public function kondisi(){
        return $this->belongsTo(Condition::class, 'id_kondisi');
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
