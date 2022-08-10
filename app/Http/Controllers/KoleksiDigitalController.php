<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Digitalfavorit;
use App\Models\Koleksidigital;
use App\Models\User;
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
        dd($koleksidigital);
        return view('home.detil.detil-koleksi-digital', [
            "title" => "Koleksi Digital",
            "koleksidigital" => $koleksidigital
        ]);
    }


    public function baca(Koleksidigital $koleksidigital)
    {
        // dd(auth()->user());
        if (auth()->user() == null) {
            return view('home.koleksi-digital.baca-koleksi-digital', [
                "title" => "Koleksi Digital",
                "koleksidigital" => $koleksidigital,   
            ]);
        }
        $todayDate = date('Y/m/d');
        $digitalfavorit = Digitalfavorit::where('id_buku', $koleksidigital->id)->where('id_user', auth()->user()->id)->whereDate('tgl_baca','=', Carbon::now())->get();
        
        foreach ($digitalfavorit as $digital) {
            // dd($digital = Carbon::now());
            if ($digital->id_buku = $todayDate) {
                // dd('tanggal = today');  
                    return view('home.koleksi-digital.baca-koleksi-digital', [
                        "title" => "Koleksi Digital",
                        "koleksidigital" => $koleksidigital,   
                    ]);
            } 
            
        }
      
        //  dd('belum ada'); 
         Digitalfavorit::create([
                    'id_user' => auth()->user()->id,
                    'id_buku' => $koleksidigital->id,
                    'tgl_baca' => $todayDate,
                ]);
                DB::table('koleksidigitals')
                ->join('digitalfavorits', 'koleksidigitals.id', '=', 'digitalfavorits.id_buku')
                ->where('id_buku', $koleksidigital->id)
                ->where('views', $koleksidigital->views)
                ->update( array(
                    'views' => DB::raw('views+1')
                ));
                return view('home.koleksi-digital.baca-koleksi-digital', [
                    "title" => "Koleksi Digital",
                    "koleksidigital" => $koleksidigital,   
                ]);
        
    }
}
