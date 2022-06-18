<?php

namespace App\Http\Controllers;

use App\Models\Katalog;
use App\Models\Peminjaman;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.peminjaman.index', [
            'title' => 'Peminjaman Buku',
            'peminjamans' => Peminjaman::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.peminjaman.create', [
            'title' => "Tambah Data Peminjaman",
            'users' => User::all(),
            'katalogs' => Katalog::all(),
            'statuses' => Status::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $validateData = $request->validate([
            'no_peminjaman' => 'required|max:255',
            'slug' => 'required|unique:peminjamans',
            'id_peminjam' => 'required',
            'id_petugas' => 'required',
            'id_buku' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
            'id_buku' => 'required',
            'status' => 'required',
            'denda' => '',
        ]);

        Peminjaman::create($validateData);
        return redirect('/dashboard/peminjamans')->with('success', 'New Peminjaman has been addedd!');
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
    public function update(Request $request, Peminjaman $peminjaman)
    {
        //
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

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Peminjaman::class, 'slug', $request->peminjaman);
        return response()->json(['slug' => $slug]);
    }
}
