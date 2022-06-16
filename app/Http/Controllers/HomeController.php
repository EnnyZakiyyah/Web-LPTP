<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Author;
use App\Models\Katalog;
use App\Models\Category;
use App\Models\Informasi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
        
        public function index(){
            $hero = Hero::latest()->get();
            $informasi = Informasi::latest()->get();
            $bukuTerbaru = Katalog::latest()->get();
            
            return view('home.home', [
                'title' => 'LPTP Surakarta',
                'hero' => $hero,
                'informasis' => $informasi,
                'buku' => $bukuTerbaru,
                
            ]);
        }
        
}
