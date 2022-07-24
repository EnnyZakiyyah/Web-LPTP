<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Models\Katalog;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'katalogs' => Katalog::all(),
            'peminjamans' => Peminjaman::all(),
            'pengembalians' => Peminjaman::where('id_status', 1)->get(),
            'contacts' => ContactUs::where('status', 0)->get(),
            'perpanjangans' => Peminjaman::where('id_perpanjangan', '=', 'Pengajuan')->get()
        ]);
    }
}
