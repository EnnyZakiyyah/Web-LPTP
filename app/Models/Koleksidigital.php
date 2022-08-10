<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Koleksidigital extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%')
                     ->orWhere('body', 'like', '%' . $search . '%') 
                     ->orWhere('author_id', 'like', '%' . $search . '%')
                     ->orWhere('isbn', 'like', '%' . $search . '%')
                     ->orWhere('tahun_terbit', 'like', '%' . $search . '%');
        });

        $query->when($filters['category'] ?? false, function($query, $catergory) {
            return $query->whereHas('category', function($query) use ($catergory) {
                $query->where('slug', $catergory);
            });
        });

        $query->when($filters['author'] ?? false, fn($query, $author) =>
            $query->whereHas('author', fn($query) =>
                $query->where('slug', $author)
            )
        );
    }

    public function label(){
        return $this->belongsTo(Label::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(Author::class);
    }

    public function pinjams(){
        return $this->hasMany(Peminjaman::class, 'id_buku');
    }

    public function digitalfavorit(){
        return $this->hasMany(Digitalfavorit::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
