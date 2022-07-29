<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Katalog;
use App\Models\Category;
use App\Models\ContactUs;
use App\Models\Bibliography;
use Illuminate\Http\Request;
use App\Models\Peminjamanbiblio;
use Illuminate\Support\Facades\DB;

class BibliographyController extends Controller
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
        
        return view('home.layanan.bibliography', [
            "title" => "Layanan" . $title,
            "bibliographies" => Katalog::where('label_id', 2)->latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString(),
            'contacts' => ContactUs::where('status', 0)->get(),
            'favorit' => Katalog::where('label_id', 2)->orderByDesc('pinjam')->get(),
        ]);
    }



}
