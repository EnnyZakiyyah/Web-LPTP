<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perpanjangan extends Model
{
    use HasFactory, Sluggable;
    protected $guarded=['id'];

    public function peminjaman(){
        return $this->belongsTo(Peminjaman::class, );
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'id'
            ]
        ];
    }

}
