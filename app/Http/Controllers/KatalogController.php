<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Katalog;
use App\Models\Category;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class KatalogController extends Controller
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
        
        return view('home.sirkulasi.penelusuran-katalog', [
            "title" => "Sirkulasi" . $title,
            "katalogs" => Katalog::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString()
        ]);
    }

    public function show(Katalog $katalog){
        return view('home.detil.detil-penelusuran-katalog', [
            "title" => "Sirkulasi",
            "katalog" => $katalog
        ]);
    }

    public function create(){
        return view('home.sirkulasi.peminjaman', [
            'title' => "Pinjam Buku",
        ]);
    }

    public function pinjam(Katalog $katalog){
        if (auth()->user()) {
            if (auth()->user()->hasRole('user||admin')) {
                $peminjaman_lama=DB::table('katalogs')
                                ->join('peminjamans','katalogs.id', '=', 'peminjamans.id_buku')
                                ->where('id_peminjam', auth()->user()->id)
                                ->get();      
                                if ($peminjaman_lama->count() == 2) {
                                    return redirect('/home/sirkulasi/penelusuran-katalog')->with('loginError', 'Maksimal 2 buku!');
                                } else {
                                    // if ($peminjaman_lama->count() == 0) {
                                        # code...
                                        
                                        Peminjaman::create([
                                            'no_peminjaman' => random_int(100000000, 999999999),
                                            'id_peminjam' => auth()->user()->id,
                                            'id_buku'=>$katalog->id,
                                            'id_lokasi' => $katalog->lokasi_id,
                                            'id_status' => 3,
                                            'denda' => ''
                                        ]);
                                        $katalog->jumlah = $katalog->jumlah-1;
                                        $katalog->save();
                                        return redirect('/home/sirkulasi/peminjaman-buku')->with('success', 'Tunggu status berubah konfirmasi!');
                                    // } else {
                                    //     if ($peminjaman_lama[0]->id_buku == $katalog->id) {
                                    //         return redirect('/home/sirkulasi/penelusuran-katalog')->with('loginError', 'Buku tidak boleh sama!');
                                    //     } else {
                                    //         Peminjaman::create([
                                    //             'no_peminjaman' => random_int(100000000, 999999999),
                                    //             'id_peminjam' => auth()->user()->id,
                                    //             'id_buku'=>$katalog->id,
                                    //             'id_lokasi' => $katalog->lokasi_id,
                                    //             'id_status' => 3,
                                    //             'denda' => ''
                                    //         ]);
                                    //         $katalog->jumlah = $katalog->jumlah-1;
                                    //         $katalog->save();
                                    //         return redirect('/home/sirkulasi/peminjaman-buku')->with('success', 'Tunggu status berubah konfirmasi!');
                                    //     }
                                        
                                    // }
                                    }
                                    return redirect('/home/sirkulasi/peminjaman-buku')->with('success', 'Tunggu status berubah konfirmasi!');
            } else {
                return redirect('/sign-in')->with('loginError', 'Login Terlebih dahulu!');
            }
            
        } else {
            return redirect('/sign-in')->with('loginError', 'Login Terlebih dahulu!');
        }
    }
}
