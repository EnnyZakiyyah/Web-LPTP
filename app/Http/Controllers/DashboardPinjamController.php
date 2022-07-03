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
   
    public function pinjam(Peminjaman $peminjaman, Katalog $katalog)
    {
        $todayDate = date('Y/m/d');
        $peminjaman->update([
                'id_petugas' => auth()->user()->id,
                'tgl_pinjam' => $todayDate,
                'tgl_kembali' => Carbon::create($todayDate)->addDays(7),
                'id_status' => 2
        ]);
        $katalog->jumlah = $katalog->jumlah-1;
        $peminjaman->save();
        return redirect('/dashboard/peminjamans')->with('success', 'Data Peminjaman has been added!');
    }

    public function kembali(Peminjaman $peminjaman)
    {
        $data = [
            'id_petugas_kembali' => auth()->user()->id,
            'tgl_pengembalian' => today(),
            'id_status' => 1,
            'denda' => 0
    ]; 
    if (Carbon::create($peminjaman->tgl_kembali)->lessThan(today())) {
        $denda = Carbon::create($peminjaman->tgl_kembali)->diffInDays(today());
        $denda = $denda * 1000;
        $data['denda'] = $denda;
    } 
       $peminjaman->update($data);
       if ($peminjaman->id_status == 1) {
        return redirect('/dashboard/sirkulasi/pengembalians')->with('success', 'Peminjaman has been returned!');
       }
       return redirect('/dashboard/peminjamans')->with('loginError', 'Peminjaman has been returned!');
    
    } 

    public function konfirmasi(Peminjaman $peminjaman)
    {
        $peminjaman->update([
            'id_petugas' => auth()->user()->id,
            'id_status' => 4
    ]);
    $peminjaman->save();
    return redirect('/dashboard/peminjamans')->with('success', 'Data Peminjaman has been confirmationed!');
    }

    public function kondisi(Peminjaman $peminjaman)
    {
        $peminjaman->update([
            'id_kondisi' => $peminjaman->id_kondisi
        ]);
        $peminjaman->save();
        return redirect('/dashboard/peminjamans')->with('success', 'Kondisi Buku has been confirmationed!');
    }
    
}
