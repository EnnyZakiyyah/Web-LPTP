<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Katalog;
use App\Models\Condition;
use App\Models\Peminjaman;
use App\Models\Bibliography;
use App\Models\User;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardPinjamController extends Controller
{
    public $tgl_pinjam;
   
    public function pinjam($id, Request $request)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        // $user = $peminjaman->katalogs->id;
        // dd($user);
        $todayDate = date('Y/m/d');
        $peminjaman->update([
            'id_petugas' => auth()->user()->id,
            'tgl_pinjam' => $todayDate,
            'reminder_at' => Carbon::create($todayDate)->addDays(6),
            'tgl_kembali' => Carbon::create($todayDate)->addDays(7),
            'id_status' => 2,
        ]);

        return redirect('/dashboard/peminjamans')->with('success', 'Data Peminjaman has been added!');
    }

    public function kembali(Peminjaman $peminjaman)
    {
        // dd($peminjaman->denda_kondisi+$peminjaman->denda);
        $data = [
            'id_petugas_kembali' => auth()->user()->id,
            'tgl_pengembalian' => today(),
            'id_status' => 1,
            'denda' => 0,
    ]; 
    
    if (Carbon::create($peminjaman->tgl_kembali)->lessThan(today())) {
        $denda = Carbon::create($peminjaman->tgl_kembali)->diffInDays(today());
        $denda = ($denda * 1000) + $peminjaman->denda_kondisi;
        $data['denda'] = $denda;
    } 
    if ($peminjaman->denda_kondisi != 0) {
        $denda_kondisi = $peminjaman->denda;
        $denda_kondisi = $peminjaman->denda_kondisi;
        $data['denda'] = $denda_kondisi;
    }
       $peminjaman->update($data);
        DB::table('katalogs')
       ->join('peminjamans', 'katalogs.id', '=', 'peminjamans.id_buku')
       ->where('id_buku', $peminjaman->id_buku)
       ->where('jumlah', $peminjaman->katalogs->jumlah)
       ->update( array(
           'jumlah' => DB::raw(  'jumlah + 1' )
       ));
    //    dd($jumlah);
       if ($peminjaman->id_status == 1) {
        return redirect('/dashboard/sirkulasi/pengembalians')->with('success', 'Peminjaman has been returned!');
       }
       return redirect('/dashboard/peminjamans')->with('loginError', 'Peminjaman has been returned!');
    
    } 

    public function konfirmasi(Peminjaman $peminjaman)
    {
        // DB::table('peminjamans')->where('id_buku', $peminjaman->id_buku)->increment('views');
        // dd($views);
        if ($peminjaman->katalogs->jumlah == 0) {
            return redirect('/dashboard/peminjamans')->with('loginError', 'Stok buku kosong!');
        } else 

        $peminjaman->update([
                'id_petugas' => auth()->user()->id,
                'id_status' => 4
        ]);
        $peminjaman->save();

        DB::table('katalogs')
        ->join('peminjamans', 'katalogs.id', '=', 'peminjamans.id_buku')
        ->where('id_buku', $peminjaman->id_buku)
        ->where('jumlah', $peminjaman->katalogs->jumlah)
        ->update( array(
            'jumlah' => DB::raw(  'jumlah - 1' )
        ));

        //count favorit
        DB::table('katalogs')
        ->join('peminjamans', 'katalogs.id', '=', 'peminjamans.id_buku')
        ->where('id_buku', $peminjaman->id_buku)
        ->where('pinjam', $peminjaman->katalogs->pinjam)
        ->update( array(
            'pinjam' => DB::raw('pinjam+1')
        ));

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

    public function jumlah(Peminjaman $peminjaman, Request $request, Katalog $katalog)
    {
        dd($katalog);
     }


    public function tolak(Peminjaman $peminjaman, Request $request)
    {
        // dd($id);
        $this->validate($request, [
            'alasan' => '',
        ]);
        $peminjaman->update([
            'id_petugas' => auth()->user()->id,
            'id_status' => 5,
            'alasan' => $request->alasan,
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
            'denda' => 0,
            'denda_kondisi' =>0
        ]; 
        if (Carbon::create($peminjaman->tgl_kembali)->lessThan(today())) {
            $denda = Carbon::create($peminjaman->tgl_kembali)->diffInDays(today());
            $denda = $denda * 1000;
            $data['denda_kondisi'] = $denda;
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
        'denda' => 0,
        'denda_kondisi' =>0
    ]; 
    if (Carbon::create($peminjaman->tgl_kembali)->lessThan(today())) {
        $denda = Carbon::create($peminjaman->tgl_kembali)->diffInDays(today());
        $denda = $denda * 1000;
        $data['denda_kondisi'] = $denda;
    } 
$peminjaman->update($data);
return redirect('/dashboard/peminjamans')->with('success', 'Kondisi Buku has been confirmationed!');

}
    
}
