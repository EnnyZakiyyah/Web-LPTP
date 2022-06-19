<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Category;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index(){

        return view('home.sirkulasi.peminjaman-buku', [
            'title' => 'Sirkulasi',
            "peminjamans" => Peminjaman::latest()->filter(request(['search']))->paginate(5)->withQueryString()
        ]);
    }
}
