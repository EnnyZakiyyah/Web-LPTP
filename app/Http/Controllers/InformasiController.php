<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Models\Informasi;
use Illuminate\Http\Request;
use Symfony\Polyfill\Intl\Idn\Info;
use Cviebrock\EloquentSluggable\Services\SlugService;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.informasi.index', [
            'title' => "Informasi",
            'informasis' => Informasi::latest()->get(),
            'contacts' => ContactUs::where('status', 0)->get()
        ]);
        // return Informasi::latest()->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.informasi.create', [
            'title' => "Tambah Data Informasi",
            'contacts' => ContactUs::where('status', 0)->get()
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
        $validateData = $request->validate([
            'nama' => 'required|max:255',
            'slug' => 'unique:informasis',
            'tanggal' => 'required',
            'informasi' => 'required'
        ]);

        Informasi::create($validateData);
        return redirect('/dashboard/informasi')->with('success', 'New Informasi has been addedd!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Informasi  $informasi
     * @return \Illuminate\Http\Response
     */
    public function show(Informasi $informasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Informasi  $informasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Informasi $informasi)
    {
        return view('dashboard.informasi.edit', [
            'title' => "Edit Data Penulis",
            'informasi' =>$informasi,
            'contacts' => ContactUs::where('status', 0)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Informasi  $informasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Informasi $informasi)
    {
        $rules = ([
            'nama' => 'required|max:255',
            'tanggal' => 'required',
            'informasi' => 'required'
        ]);

        if($request->slug != $informasi->slug) {
            $rules['slug'] = 'unique:informasis';
        }

        $validateData = $request->validate($rules);

        Informasi::where('id', $informasi->id)->update($validateData);
        return redirect('/dashboard/informasi')->with('success', 'Informasi has been editedd!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Informasi  $informasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Informasi $informasi)
    {
        Informasi::destroy($informasi->id);
        return redirect('/dashboard/informasi')->with('success', 'Informasi has been deleted!');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Informasi::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
    }
}
