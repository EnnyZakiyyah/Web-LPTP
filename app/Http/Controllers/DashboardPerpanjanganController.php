<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Peminjaman;
use App\Models\Perpanjangan;
use Illuminate\Http\Request;

class DashboardPerpanjanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.sirkulasi.perpanjangan.index', [
            'title' => 'Ajuan Perpanjangan',
            'perpanjangans' => Perpanjangan::latest()->get()
        ]);
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
     * @param  \App\Models\Perpanjangan  $perpanjangan
     * @return \Illuminate\Http\Response
     */
    public function show(Perpanjangan $perpanjangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perpanjangan  $perpanjangan
     * @return \Illuminate\Http\Response
     */
    public function edit(Perpanjangan $perpanjangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perpanjangan  $perpanjangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perpanjangan $perpanjangan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perpanjangan  $perpanjangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perpanjangan $perpanjangan)
    {
        Perpanjangan::destroy($perpanjangan->id);
        return redirect('/dashboard/ajuan-perpanjangan')->with('success', 'Data Ajuan has been deleted!');
    }
    
    public function tolak(Peminjaman $peminjaman, Request $request)
    {
        $validateData = $request->validate([
            'id_perpanjangan' => '',
        ]);
        Peminjaman::where('id', $peminjaman->id)->update($validateData);
        // dd($validateData);
        return redirect('/dashboard/peminjamans')->with('success', 'Perpanjangan has been rejected!');
    }

    public function setujui(Peminjaman $peminjaman, Request $request)
    {
        $todayDate = date('Y/m/d');
        $peminjaman->update([
                'id_petugas' => auth()->user()->id,
                'tgl_pinjam' => $todayDate,
                'tgl_kembali' => Carbon::create($todayDate)->addDays(7),
                'id_status' => 6,
                'id_perpanjangan' => 'Disetujui',
        ]);
        $peminjaman->save();
        return redirect('/dashboard/peminjamans')->with('success', 'Perpanjangan has been approved!');
    }
}
