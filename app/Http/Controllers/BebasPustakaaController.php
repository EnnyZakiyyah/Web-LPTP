<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Peminjaman;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class BebasPustakaaController extends Controller
{
    public function pustaka(Peminjaman $peminjaman){
        // dd($peminjaman);
        return view('home.sirkulasi.index-bebas-pustaka', [
            'title' => 'Sirkulasi',
            'pustaka' => Peminjaman::where([
                ['id_peminjam', auth()->user()->id],
                ['id_status', 3]
                ])->orWhere([
                    ['id_peminjam', auth()->user()->id],
                    ['id_status', 2]
                ])->orWhere([
                    ['id_peminjam', auth()->user()->id],
                    ['id_status', 7]
                ])->latest()->paginate(5)->withQueryString()
            ]);
    }

    public function cetak(Peminjaman $peminjaman)
    {
        if ($peminjaman->id_status == 2 || $peminjaman->id_status == 7) {
            return redirect('/home/sirkulasi/peminjaman-buku')->with('loginError', 'Masih ada Peminjaman Buku');
        }
        // dd('berhasil');
        $data = User::where('id', auth()->user()->id)->get();
        view()->share('data', $data);
        $pdf = PDF::loadView('home/sirkulasi/bebas-pustaka');   
        return $pdf->download('cetak-bebas-pustaka.pdf');
    }    
}
