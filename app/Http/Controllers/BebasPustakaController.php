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
    public function index()
    {
       
               
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
    public function show($id)
    {
        dd($id);
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
        // dd($peminjaman);
        $data = User::where('id', auth()->user()->id)->get();
                        
        view()->share('data', $data);
        $pdf = PDF::loadView('home/sirkulasi/bebas-pustaka');   
        

        $peminjaman_lama = DB::table('katalogs')
                        ->join('peminjamans', 'katalogs.id', '=', 'peminjamans.id_buku')
                        ->where('id_peminjam', auth()->user()->id)
                        ->where('id_status', '!=', 2)
                        ->where('id_status', '!=', 6)
                        ->get();
                        dd($peminjaman_lama);
                        if ($peminjaman_lama == true) {
                        }
                        // dd($peminjaman_lama);
                        return $pdf->download('cetak-bebas-pustaka.pdf');
    }
}
