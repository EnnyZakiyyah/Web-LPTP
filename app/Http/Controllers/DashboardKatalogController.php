<?php

namespace App\Http\Controllers;

use App\Models\Katalog;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardKatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.sirkulasi.penelusuran-katalog.index', [
            'title' => "Penelusuran-Katalog",
            'katalogs' => Katalog::latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.sirkulasi.penelusuran-katalog.create', [
            'title' => "Tambah Data Katalog",
            'categories' => Category::all()
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
            'title' => 'required|max:255',
            'slug' => 'required|unique:katalogs',
            'category_id' => 'required',
            'body' => 'required',
            'penulis' => 'required|max:255',
            'edisi' => '',
            'isbn' => '',
            'penerbit' => '',
            'tahun_terbit' => '',
            'tempat_terbit' => '',
            'jumlah' => 'required',
            'bahasa' => '',
            'lokasi' => '',
            'author_id' => ''
        ]);

        // $validateData['_id'] = auth()->author()->id;    //INI JUGA SAMA. SEMENTARA PAKAI AUTHOR DULU. KALAU MAU GANTI USER ID, NANTI BISA.
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Katalog::create($validateData);
        return redirect('/dashboard/sirkulasi/katalogs')->with('success', 'New Katalog has been addedd!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Katalog  $katalog
     * @return \Illuminate\Http\Response
     */
    public function show(Katalog $katalog)
    {
        return view('dashboard.sirkulasi.penelusuran-katalog.show', [
            'title' => "Detail Katalog",
            'katalog' => $katalog
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Katalog  $katalog
     * @return \Illuminate\Http\Response
     */
    public function edit(Katalog $katalog)
    {
        return view('dashboard.sirkulasi.penelusuran-katalog.edit', [
            'title' => "Edit Data Katalog",
            'katalog' =>$katalog,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Katalog  $katalog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Katalog $katalog)
    {
        $rules = ([
            'title' => 'required|max:255',    
            'category_id' => 'required',
            'body' => 'required',
            'edisi' => '',
            'isbn' => '',
            'penerbit' => '',
            'tahun_terbit' => '',
            'tempat_terbit' => '',
            'jumlah' => 'required',
            'bahasa' => '',
            'lokasi' => '',
            'author_id' => ''
        ]);

        if($request->slug != $katalog->slug) {
            $rules['slug'] = 'required|unique:katalogs';
        }

        $validateData = $request->validate($rules);

        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Katalog::where('id', $katalog->id)->update($validateData);
        return redirect('/dashboard/sirkulasi/katalogs')->with('success', 'Katalog has been updatedd!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Katalog  $katalog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Katalog $katalog)
    {
        Katalog::destroy($katalog->id);
        return redirect('/dashboard/sirkulasi/katalogs')->with('success', 'Katalog has been deleted!');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Katalog::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
