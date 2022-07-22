<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ContactUs;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;

class BebasPustakaaController extends Controller
{
    public function pustaka(Peminjaman $peminjaman){
        // dd($peminjaman);
        $bebas = Peminjaman::where(
            'id_peminjam', auth()->user()->id)->get();
        // dd($bebas);
        return view('home.sirkulasi.index-bebas-pustaka', [
            'title' => 'Sirkulasi',
            'pustaka' => $bebas,
            'users' => User::where('id', auth()->user()->id)->get(),
            'contacts' => ContactUs::where('status', 0)->get()
            ]);
    }

    public function cetak($id)
    {
        // dd($id);
        $peminjaman = Peminjaman::findOrFail($id);
        // dd($peminjaman);
        if ($peminjaman->id_status == 2 || $peminjaman->id_status == 7) {
            return redirect('/home/sirkulasi/peminjaman-buku')->with('loginError', 'Masih ada Peminjaman Buku');
        }
        // dd('berhasil');
        $data = User::where('id', auth()->user()->id)->get();
        view()->share('data', $data);
        $pdf = PDF::loadView('home/sirkulasi/bebas-pustaka');   
        return $pdf->download('cetak-bebas-pustaka.pdf');
    }    

    public function cetakkosong($id)
    {
        $user = User::findOrFail($id);
        // dd($user);

        $data = User::where('id', auth()->user()->id)->get();
        view()->share('data', $data);
        $pdf = PDF::loadView('home/sirkulasi/bebas-pustaka');   
        return $pdf->download('cetak-bebas-pustaka.pdf');
    }
}
