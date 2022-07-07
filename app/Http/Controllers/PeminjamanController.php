<?php

namespace App\Http\Controllers;

use App\Models\Katalog;
use Carbon\Carbon;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Models\Peminjamanbiblio;
use App\Models\Perpanjangan;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Peminjaman $peminjaman)
    {
        if ($peminjaman->id_status != 1) {
            return view('home.sirkulasi.peminjaman-buku', [
                'title' => 'Sirkulasi',
                "peminjamans" => Peminjaman::where([
                                ['id_peminjam', auth()->user()->id],
                                ['id_status', 3]
                    ])->orWhere([
                        ['id_peminjam', auth()->user()->id],
                        ['id_status', 4]
                    ])->orWhere([
                        ['id_peminjam', auth()->user()->id],
                        ['id_status', 2]
                    ])->orWhere([
                        ['id_peminjam', auth()->user()->id],
                        ['id_status', 5]
                    ])->orWhere([
                        ['id_peminjam', auth()->user()->id],
                        ['id_status', 6]
                    ])->orWhere([
                        ['id_peminjam', auth()->user()->id],
                        ['id_status', 7]
                    ])->latest()->paginate(5)->withQueryString()
            ]);
        } 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function show(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function edit(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peminjaman $peminjaman, Katalog $katalog, $id)
    {
        dd($peminjaman);
        $request->validate([
                    'no_peminjaman' => 'required|max:255',
                    'id_peminjam' => 'required',
                    'id_petugas' => 'required',
                    'tgl_kembali' => 'required',
                    'id_buku' => 'required',
                    'id_lokasi' => 'required',
                    'id_status' => 'required',
                    'denda' => '',
                ]);
        $peminjaman = Peminjaman::findOrFail($id);
        $todayDate = date('Y/m/d');
        $peminjaman = Peminjaman::where('id', $peminjaman->id)
        ->update([
                'no_peminjaman' => $request->no_peminjaman,
                'title' => $request->title,
                'id_petugas' => auth()->user()->id,
                'id_peminjam' => $request->id_peminjam,
                'tgl_pinjam' => $todayDate,
                'id_buku'=>$request->title,
                'id_lokasi' =>$request->id_lokasi,
                'tgl_kembali' => Carbon::create($this->tgl_pinjam)->addDays(7),
                'id_status' => 2, 
            ]);
            $katalog->jumlah = $katalog->jumlah-1;
            $katalog->save();
            return redirect('/dashboard/peminjamans')->with('success', 'Data Peminjaman has been added!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peminjaman $peminjaman)
    {
        //
    }
    
}
