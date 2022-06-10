<?php

namespace App\Http\Controllers;

use App\Models\Katalog;
use Illuminate\Http\Request;

class KatalogController extends Controller
{
    public function index(){
        return view('home.sirkulasi.penelusuran-katalog', [
            "title" => "Sirkulasi",
            "katalogs" => Katalog::latest()->get()
        ]);
    }

    public function show(Katalog $katalog){
        return view('home.detil.detil-penelusuran-katalog', [
            "title" => "Sirkulasi",
            "katalog" => $katalog
        ]);
    }
}
