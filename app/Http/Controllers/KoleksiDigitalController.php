<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Category;
use App\Models\Koleksidigital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KoleksiDigitalController extends Controller
{
    public function index(){
        $title = '';
        if (request('category')) {
            $catergory = Category::firstWhere('slug', request('category'));
            $title = ' in '. $catergory->name;
        }

        if (request('author')) {
            $author = Author::firstWhere('slug', request('author'));
            $title = ' by '. $author->nama;
        }
        
        return view('home.koleksi-digital.koleksi-digital', [
            "title" => "Koleksi Digital" . $title,
            "koleksidigitals" => Koleksidigital::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString(),
            'favorit' => DB::table('koleksidigitals')->orderByDesc('views')->get(),
        ]);
    }

    public function show(Koleksidigital $koleksidigital){
        return view('home.detil.detil-koleksi-digital', [
            "title" => "Koleksi Digital",
            "koleksidigital" => $koleksidigital
        ]);
    }


    public function baca(Koleksidigital $koleksidigital){
        // dd($view);
        DB::table('koleksidigitals')->where('id', $koleksidigital->id)->increment('views');
        return view('home.koleksi-digital.baca-koleksi-digital', [
            "title" => "Koleksi Digital",
            "koleksidigital" => $koleksidigital,
            
            
        ]);
    }
}
