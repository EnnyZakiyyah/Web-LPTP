<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Katalog;
use App\Models\Category;
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
            "bibliographies" => Katalog::where('label_id', 2)->latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString()
        ]);
    }

    // public function show(Bibliography $bibliography){
    //     return view('home.detil.detil-bibliography', [
    //         "title" => "Layanan",
    //         "bibliography" => $bibliography,
    //         // dd('$bibliography')
    //     ]);
    // }
    public function show(Katalog $katalog){
        // return view('home.detil.detil-bibliography', [
        //     "title" => "Layanan",
        //     "bibliographies" => $bibliography
        // ]);
        dd($katalog);
    }

    // public function pinjam(Bibliography $bibliography){
    //     if (auth()->user()) {
    //         if (auth()->user()->hasRole('user||admin')) {
    //             $peminjaman_lama=DB::table('bibliographies')
    //                             ->join('peminjamans','bibliographies.id', '=', 'peminjamans.id_bibliography')
    //                             ->where('id_peminjam', auth()->user()->id)
    //                             ->get();      
    //                             if ($peminjaman_lama->count() == 2) {
    //                                 return redirect('/home/layanan/bibliography')->with('loginError', 'Maksimal 2 buku!');
    //                             } else {
    //                                 // if ($peminjaman_lama->count() == 0) {
    //                                     # code...
                                        
    //                                     Peminjamanbiblio::create([
    //                                         'no_peminjaman' => random_int(100000000, 999999999),
    //                                         'id_peminjam' => auth()->user()->id,
    //                                         'id_bibliography'=>$bibliography->id,
    //                                         'id_lokasi' => $bibliography->lokasi_id,
    //                                         'id_status' => 3,
    //                                         'denda' => ''
    //                                     ]);
    //                                     $bibliography->jumlah = $bibliography->jumlah-1;
    //                                     $bibliography->save();
    //                                     // dd($bibliography);
    //                                     return redirect('/home/sirkulasi/peminjaman-buku')->with('success', 'Tunggu status berubah konfirmasi!');
    //                                 // } else {
    //                                 //     if ($peminjaman_lama[0]->id_buku == $katalog->id) {
    //                                 //         return redirect('/home/sirkulasi/penelusuran-katalog')->with('loginError', 'Buku tidak boleh sama!');
    //                                 //     } else {
    //                                 //         Peminjaman::create([
    //                                 //             'no_peminjaman' => random_int(100000000, 999999999),
    //                                 //             'id_peminjam' => auth()->user()->id,
    //                                 //             'id_buku'=>$katalog->id,
    //                                 //             'id_lokasi' => $katalog->lokasi_id,
    //                                 //             'id_status' => 3,
    //                                 //             'denda' => ''
    //                                 //         ]);
    //                                 //         $katalog->jumlah = $katalog->jumlah-1;
    //                                 //         $katalog->save();
    //                                 //         return redirect('/home/sirkulasi/peminjaman-buku')->with('success', 'Tunggu status berubah konfirmasi!');
    //                                 //     }
                                        
    //                                 // }
    //                                 }
    //                                 return redirect('/home/layanan/bibliography')->with('success', 'Tunggu status berubah konfirmasi!');
    //         } else {
    //             return redirect('/sign-in')->with('loginError', 'Login Terlebih dahulu!');
    //         }
            
    //     } else {
    //         return redirect('/sign-in')->with('loginError', 'Login Terlebih dahulu!');
    //     }
    // }
}
