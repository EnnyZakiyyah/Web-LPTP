<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Katalog extends Model
{
    use HasFactory;

    private static $blog_katalogs = [
        [
            "title" => "judul post pertama",
            "slug" => "judul-post-pertama",
            "author" => "Enny Zakiyyah",
            "body" => "fsfsdf"
        ],
       
        [
            "title" => "judul post kedua",
            "slug" => "judul-post-kedua",
            "author" => "Enny Zakiyyah",
            "body" => "fsfsdf"
        ]
    ];

    public static function alll(){
        return collect(self::$blog_katalogs);
    }

    public static function find($slug){
        $katalogs = static::alll();
        // $katalog = [];
        // foreach ($katalogs as $p) {
        //     if($p["slug"] === $slug){
        //         $katalog = $p;
        //     }
        // }
        return $katalogs->firstWhere('slug', $slug);
    }
    
}
