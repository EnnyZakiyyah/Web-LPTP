<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Bibliography;
use App\Models\Katalog;
use App\Models\Category;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Psy\Command\WhereamiCommand;

class KatalogController extends Controller
{
    public function index()
    {
        $title = '';
        if (request('category')) {
            $catergory = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $catergory->name;
        }

        if (request('author')) {
            $author = Author::firstWhere('id', request('author'));
            $title = ' by ' . $author->id;
        }
        
       
        return view('home.sirkulasi.penelusuran-katalog', [
            "title" => "Sirkulasi" . $title,
            "katalogs" => Katalog::where('label_id', 1)->latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString(),
            'favorit' => Katalog::where('label_id', 1)->orderByDesc('pinjam')->get(),
        ]);
    }

    public function show(Katalog $katalog)
    {
        return view('home.detil.detil-penelusuran-katalog', [
            "title" => "Sirkulasi",
            "katalog" => $katalog
        ]);
    }

    public function showbiblio(Katalog $katalog)
    {
        return view('home.detil.detil-bibliography', [
            "title" => "Layanan",
            "katalog" => $katalog
        ]);
    }

    public function create()
    {
        return view('home.sirkulasi.peminjaman', [
            'title' => "Pinjam Buku",
        ]);
    }

    public function pinjam(Katalog $katalog, Bibliography $bibliography, Peminjaman $peminjaman)
    {
        if (auth()->user()) {
            DB::table('peminjamans')->increment('dipinjam');
            if (auth()->user()->hasRole('user')) {
                $label = DB::table('labels')
                    ->join('katalogs', 'labels.id', '=', 'katalogs.label_id')
                    ->get();
                if ($label->id = 1) {
                    $peminjaman_lama = DB::table('katalogs')
                        ->join('peminjamans', 'katalogs.id', '=', 'peminjamans.id_buku')
                        ->where('id_peminjam', auth()->user()->id)
                        ->where('id_status', '!=', 1)
                        ->where('id_status', '!=', 5)
                        ->get();
                    if ($peminjaman_lama->count() == 2) {
                        return redirect('/home/sirkulasi/peminjaman-buku')->with('loginError', 'Maksimal 2 buku!');
                    } else {
                        Peminjaman::create([
                            'no_peminjaman' => random_int(100000000, 999999999),
                            'id_peminjam' => auth()->user()->id,
                            'id_buku' => $katalog->id,
                            // 'id_bibliography'=>'',
                            'id_lokasi' => $katalog->lokasi_id,
                            'id_status' => 3,
                            'denda' => '',
                        ]);
                        return redirect('/home/sirkulasi/peminjaman-buku')->with('success', 'Tunggu status berubah konfirmasi! paling lambat 1x24 jam dihari kerja');
                    }
                    return redirect('/home/sirkulasi/peminjaman-buku')->with('success', 'Tunggu status berubah konfirmasi! paling lambat 1x24 jam dihari kerja');
                } else {
                    $peminjaman_lama = DB::table('bibliographies')
                        ->join('peminjamans', 'bibliographies.id', '=', 'peminjamans.id_bibliography')
                        ->where('id_peminjam', auth()->user()->id)
                        ->where('id_status', '!=', 1)
                        ->where('id_status', '!=', 5)
                        ->get();
                    if ($peminjaman_lama->count() == 2) {
                        return redirect('/home/layanan/bibliographies')->with('loginError', 'Maksimal 2 buku!');
                    } else {
                        // if ($peminjaman_lama->count() == 0) {
                        # code...

                        Peminjaman::create([
                            'no_peminjaman' => random_int(100000000, 999999999),
                            'id_peminjam' => auth()->user()->id,
                            // 'id_buku'=>$katalog->id,
                            'id_bibliography' => $katalog->id,
                            'id_lokasi' => $katalog->lokasi_id,
                            'id_status' => 3,
                            'denda' => '',
                        ]);
                        return redirect('/home/sirkulasi/peminjaman-buku')->with('success', 'Tunggu status berubah konfirmasi! paling lambat 1x24 jam dihari kerja');
                    }
                }
            } elseif (auth()->user()->hasRole('admin')) {
                return redirect('/home/sirkulasi/peminjaman-buku')->with('loginError', 'Anda login sebagai admin!');
            } else {
                return redirect('/sign-in')->with('loginError', 'Login Terlebih dahulu!');
            }
        } else {
            return redirect('/sign-in')->with('loginError', 'Login Terlebih dahulu!');
        }
    }
}
