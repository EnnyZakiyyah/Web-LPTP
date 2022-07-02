<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Lokasi;
use App\Models\Status;
use App\Models\Katalog;
use App\Models\Peminjaman;
use App\Models\Bibliography;
use App\Models\Condition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            'statuses' => Status::all(),
            'lokasis' => Lokasi::all(),
            'kondisis' => Condition::all()
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
            'id_buku' => '',
            'id_kondisi' => '',
            'id_bibliography' => '',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
            'id_buku' => 'required',
            'id_lokasi' => 'required',
            'id_status' => 'required',
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
        return view('dashboard.peminjaman.show', [
            'title' => "Detail Peminjaman",
            'peminjaman' => $peminjaman
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function edit(Peminjaman $peminjaman)
    {
        return view('dashboard.peminjaman.edit', [
            'title' => "Edit Data Peminjaman",
            'peminjaman' => $peminjaman,
            'users' => User::all(),
            'katalogs' => Katalog::all(),
            'statuses' => Status::all(),
            'lokasis' => Lokasi::all(),
            'kondisis' => Condition::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peminjaman $peminjaman, Katalog $katalog)
    {
        $todayDate = date('Y/m/d');
        $rules = ([
            'no_peminjaman' => 'required|max:255',
            'id_peminjam' => 'required',
            'id_petugas' => 'required',
            'id_buku' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
            'id_buku' => 'required',
            'id_lokasi' => 'required',
            'id_status' => 'required',
            'id_kondisi' => 'required',
            'denda' => '',
        ]);

        if($request->slug != $peminjaman->slug) {
            $rules['slug'] = 'required|unique:peminjamans';
        }
        $validateData['tgl_pinjam'] =  $todayDate;
        $validateData['tgl_kembali'] = Carbon::create($todayDate)->addDays(7);
        $katalog->jumlah = $katalog->jumlah-1;
        $validateData = $request->validate($rules);

        Peminjaman::where('id', $peminjaman->id)->update($validateData);
        return redirect('/dashboard/peminjamans')->with('success', 'Data Peminjaman has been editedd!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peminjaman $peminjaman)
    {
        Peminjaman::destroy($peminjaman->id);
        return redirect('/dashboard/peminjamans')->with('success', 'Data Peminjaman has been deleted!');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Peminjaman::class, 'slug', $request->no_peminjaman);
        return response()->json(['slug' => $slug]);
    }


    public $tgl_pinjam;
   
    public function pinjam(Peminjaman $peminjaman, Request $request, Katalog $katalog)
    {
        // dd($peminjaman);
        // $todayDate = date('Y/m/d');
        // $rules = ([
        //     'no_peminjaman' => 'required|max:255',
        //     'id_peminjam' => 'required',
        //     'id_petugas' => 'required',
        //     'tgl_kembali' => 'required',
        //     'id_buku' => 'required',
        //     'id_lokasi' => 'required',
        //     'id_status' => 'required',
        //     'denda' => '',
        // ]);

        // if($request->slug != $peminjaman->slug) {
        //     $rules['slug'] = 'required|unique:peminjamans';
        // }
        // $validateData['tgl_pinjam'] =  $todayDate;
        // $validateData['tgl_kembali'] = Carbon::create($this->tgl_pinjam)->addDays(7);
        // $validateData = $request->validate($rules);
        // $katalog->jumlah = $katalog->jumlah-1;

        // Peminjaman::where('id', $peminjaman->id)->update($validateData);
        // dd($request->no_peminjaman);
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

        // $this->validate($request, [
        //     'no_peminjaman' => 'required|max:255',
        //     'id_peminjam' => 'required',
        //     'id_petugas' => 'required',
        //     'tgl_kembali' => 'required',
        //     'id_buku' => 'required',
        //     'id_lokasi' => 'required',
        //     'id_status' => 'required',
        //     'denda' => '',
        // ]);
        
        // $peminjaman = Peminjaman::findOrFail($id);
        // $peminjaman = Peminjaman::findOrFail($id);

        $todayDate = date('Y/m/d');
        $peminjaman->update([
        'no_peminjaman' => $request->no_peminjaman,
        'title' => $katalog->title,
        'id_petugas' => auth()->user()->id,
        'id_peminjam' => $request->id_peminjam,
        'tgl_pinjam' => $todayDate,
        'id_buku'=>$request->title,
        'id_lokasi' =>$request->id_lokasi,
        'tgl_kembali' => Carbon::create($this->tgl_pinjam)->addDays(7),
        'id_status' => 2
    ]);
    $katalog->jumlah = $katalog->jumlah-1;
    $katalog->save();
        return redirect('/dashboard/peminjamans')->with('success', 'Data Peminjaman has been added!');
    }


}

