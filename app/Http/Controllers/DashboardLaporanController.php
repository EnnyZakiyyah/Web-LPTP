<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\Status;
use App\Models\Katalog;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use Svg\Tag\Rect;

class DashboardLaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fromdate = $request->fromdate;
        $todate = $request->todate;
        $id_kondisi = $request->id_kondisi;
        return view('dashboard.laporan.index', [
            'title' => 'Laporan',
            'laporans' => Peminjaman::whereBetween('tgl_pinjam', [$fromdate, $todate])->latest()->where('id_kondisi', [$id_kondisi])->paginate(5)->withQueryString(),
            'kondisis' => Condition::all()
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

    public function cetak(Request $request)
    {
    //    dd("tanggal awal".$fromdate,"tanggal akhir".$todate);
        $fromdate = $request->fromdate;
        $todate = $request->todate;
        $peminjaman = Status::all();
        $kondisi = Condition::all();
        $koleksi = Category::all();
        $labels = Label::all();
        $denda = DB::table('peminjamans')->sum('denda');
        view()->share('peminjaman', $peminjaman);
        view()->share('koleksi', $koleksi);
        view()->share('labels', $labels);
        view()->share('kondisi', $kondisi);
        view()->share('denda', $denda);
        $pdf = PDF::loadView('dashboard/laporan/cetak-laporan');    
        return $pdf->download('cetak-laporan.pdf');


        // 'laporans' => Peminjaman::whereBetween('tgl_pinjam', [$fromdate, $todate])->where('id_kondisi', [$id_kondisi])->paginate(5)->withQueryString();
        // $id_kondisi = $request->id_kondisi;
        // $fromdate = $request->fromdate;
        // $todate = $request->todate;
        // $peminjaman = Peminjaman::all();
        // // dd($peminjaman);
        // view()->share('peminjaman', $peminjaman);
        // $pdf = PDF::loadView('dashboard/laporan/laporan');    
        // return $pdf->download('cetak-laporan.pdf');

    }

    public function laporan($fromdate,$todate)
    {
        
        // dd("tanggal awal".$fromdate,"tanggal akhir".$todate);
        // $fromdate = $request->fromdate;
        // $todate = $request->todate;
        $cetak = Peminjaman::whereBetween('tgl_pinjam ', [$fromdate, $todate])->get();
        dd($cetak);
        return view('dashboard.laporan.cetak', [
            'cetak' => $cetak,
        ]);
    }

    public function print(Request $request)
    {
        $peminjaman = Status::all();
        $kondisi = Condition::all();
        $categories = Category::all();
        $denda = Peminjaman::all();
        $katalogs = Katalog::withCount('categories')->orderBy('created_at', 'asc');
        return view('dashboard.laporan.cetak', [
            'katalogs' => $katalogs,
            'categories' => $categories,
            'peminjaman' => $peminjaman,
            'kondisi' => $kondisi,
            // 'denda'

            // 'categories' => Category::withCount('majalah')->orderBy('name', 'asc')
        ]);

    }
}
