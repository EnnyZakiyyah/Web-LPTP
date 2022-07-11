<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Katalog;
use App\Models\Peminjaman;
use App\Models\Bibliography;
use App\Models\Condition;
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
                'reminder_at' => Carbon::create($todayDate)->addDays(6),
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

    public function kondisi(Peminjaman $peminjaman, Request $request)
    {
        $validateData = $request->validate([
            'id_kondisi' => '',
        ]);
        Peminjaman::where('id', $peminjaman->id)->update($validateData);
        // dd($validateData);
        if ($peminjaman->id_kondisi == 1) {
            
            $todayDate = date('Y/m/d');
            $validateData = $request->validate([
                'id_petugas' => auth()->user()->id,
                'tgl_pinjam' => $todayDate,
                'reminder_at' => Carbon::create($todayDate)->addDays(6),
                'tgl_kembali' => Carbon::create($todayDate)->addDays(7),
                'id_status' => 6
            ]);
            Peminjaman::where('id', $peminjaman->id)->update($validateData);
        }
        return redirect('/dashboard/peminjamans')->with('success', 'Kondisi Buku has been confirmationed!');
    }

    public function tolak(Peminjaman $peminjaman)
    {
        // dd($peminjaman);
        $peminjaman->update([
            'id_petugas' => auth()->user()->id,
            'id_status' => 5
        ]);
        $peminjaman->save();
        return redirect('/dashboard/peminjamans')->with('success', 'Peminjaman Buku has been rejected !');
    }

    public function hilang(Peminjaman $peminjaman, Request $request){
        $todayDate = date('Y/m/d');
        $data = [
            'id_petugas' => auth()->user()->id,
            'tgl_pinjam' => $todayDate,
            'reminder_at' => Carbon::create($todayDate)->addDays(6),
            'tgl_kembali' => Carbon::create($todayDate)->addDays(7),
            'id_status' => 7,
            'id_kondisi' => 1,
            'denda' => 0
        ]; 
        if (Carbon::create($peminjaman->tgl_kembali)->lessThan(today())) {
            $denda = Carbon::create($peminjaman->tgl_kembali)->diffInDays(today());
            $denda = $denda * 1000;
            $data['denda'] = $denda;
        } 
    $peminjaman->update($data);
    return redirect('/dashboard/peminjamans')->with('success', 'Kondisi Buku has been confirmationed!');
 
}

public function rusak(Peminjaman $peminjaman, Request $request){
    $todayDate = date('Y/m/d');
    $data = [
        'id_petugas' => auth()->user()->id,
        'tgl_pinjam' => $todayDate,
        'reminder_at' => Carbon::create($todayDate)->addDays(6),
        'tgl_kembali' => Carbon::create($todayDate)->addDays(7),
        'id_status' => 7,
        'id_kondisi' => 2,
        'denda' => 0
    ]; 
    if (Carbon::create($peminjaman->tgl_kembali)->lessThan(today())) {
        $denda = Carbon::create($peminjaman->tgl_kembali)->diffInDays(today());
        $denda = $denda * 1000;
        $data['denda'] = $denda;
    } 
$peminjaman->update($data);
return redirect('/dashboard/peminjamans')->with('success', 'Kondisi Buku has been confirmationed!');

}
    
}
