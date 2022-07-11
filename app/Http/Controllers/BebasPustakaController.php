<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;

class BebasPustakaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Peminjaman $peminjaman)
    {
        return view('home.sirkulasi.index-bebas-pustaka', [
            'title' => 'Sirkulasi',
            'pustaka' => Peminjaman::all()
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Peminjaman $peminjaman)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function pustaka(Peminjaman $peminjaman)
    {
        if ($peminjaman->id_status == 2 || $peminjaman->id_status == 7) {
            return redirect('/home/sirkulasi/peminjaman-buku')->with('loginError', 'Masih ada Peminjaman Buku');
        }
        $data = User::where('id', auth()->user()->id)->get();
        view()->share('data', $data);
        $pdf = PDF::loadView('home/sirkulasi/bebas-pustaka');   
        return $pdf->download('cetak-bebas-pustaka.pdf');
    }        
    
    public function bebas(Peminjaman $peminjaman)
    {
        return view('home.sirkulasi.index-bebas-pustaka', [
            'title' => 'Sirkulasi',
            'pustaka' => $peminjaman
        ]);
    }
}
