<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Katalog;
use App\Models\Peminjaman;
use App\Models\Bibliography;
use Illuminate\Http\Request;

class DashboardPinjamController extends Controller
{
    public $tgl_pinjam;
   
    public function pinjam(Peminjaman $peminjaman, Request $request)
    {
        $todayDate = date('Y/m/d');
        $peminjaman->update([
                'id_petugas' => auth()->user()->id,
                'tgl_pinjam' => $todayDate,
                'tgl_kembali' => Carbon::create($this->tgl_pinjam)->addDays(7),
                'id_status' => 2
        ]);
        $peminjaman->save();
        return redirect('/dashboard/peminjamans')->with('success', 'Data Peminjaman has been added!');
    }

    
}
