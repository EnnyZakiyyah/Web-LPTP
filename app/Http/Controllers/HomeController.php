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

            $informasi = Informasi::whereDate('tanggal', '>=', today())->get();
            $hero = Hero::latest()->get();
            // $informasi = $informasi;
            $bukuTerbaru = Katalog::latest()->filter(request(['search']))->get();
            
            return view('home.home', [
                'title' => 'LPTP Surakarta',
                'hero' => $hero,
                'informasis' => $informasi,
                'buku' => $bukuTerbaru,
                
            ]);
        }
        
}
