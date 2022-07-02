<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Koleksidigital;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardKoleksiDigitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.koleksi-digital.index', [
            'title' => "Koleksi Digital",
            'koleksidigitals' => Koleksidigital::latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.koleksi-digital.create', [
            'title' => "Tambah Data Koleksi Digital",
            'categories' => Category::all(),
            'authors' => Author::all()
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
            'title' => 'required|max:50',
            'slug' => 'required|unique:koleksidigitals',
            'category_id' => 'required',
            'author_id' => '',
            'body' => 'required',
            'edisi' => '',
            'isbn' => 'required|unique:koleksidigitals',
            'penerbit' => '',
            'tahun_terbit' => '',
            'tempat_terbit' => '',
            'bahasa' => '',
            'filekatalog' => 'file|max:2048',
            'image' => 'image|file|max:2048'
        ]);

        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('koleksi-images');
        }

        if ($request->file('filekatalog')) {
            $validateData['filekatalog'] = $request->file('filekatalog')->store('koleksi-files');
        }
        $validateData['author_id'] = implode(', ', $request->author_id);
        $validateData['title'] = Str::limit(strip_tags($request->title), 35);
        // $validateData['author_id'] = auth()->user->id;    //INI JUGA SAMA. SEMENTARA PAKAI AUTHOR DULU. KALAU MAU GANTI USER ID, NANTI BISA.
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 100);

        Koleksidigital::create($validateData);
        return redirect('/dashboard/koleksidigitals')->with('success', 'New Koleksi Digital has been addedd!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Koleksidigital  $koleksidigital
     * @return \Illuminate\Http\Response
     */
    public function show(Koleksidigital $koleksidigital)
    {
        return view('dashboard.koleksi-digital.show', [
            'title' => "Detail Koleksi",
            'koleksidigital' => $koleksidigital
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Koleksidigital  $koleksidigital
     * @return \Illuminate\Http\Response
     */
    public function edit(Koleksidigital $koleksidigital)
    {
        return view('dashboard.koleksi-digital.edit', [
            'title' => "Edit Data Koleksi Digital",
            'koleksidigital' =>$koleksidigital,
            'categories' => Category::all(),
            'authors' => Author::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Koleksidigital  $koleksidigital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Koleksidigital $koleksidigital)
    {
        $rules = ([
            'title' => 'required|max:50',    
            'category_id' => 'required',
            'body' => 'required',
            'edisi' => '',
            'isbn' => '',
            'penerbit' => '',
            'tahun_terbit' => '',
            'tempat_terbit' => '',
            'bahasa' => '',
            'author_id' => '',
            'filekatalog' => 'file|max:2048',
            'image' =>'image|file|max:5120'
        ]);

        if($request->slug != $koleksidigital->slug) {
            $rules['slug'] = 'required|unique:koleksidigitals';
        }

        if($request->isbn != $koleksidigital->isbn) {
            $rules['isbn'] = 'required|unique:koleksidigitals';
        }

        // $validateData['author_id'] = auth()->user()->id;
        $validateData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('koleksi-images');
        } 
        if($request->file('filekoleksi')) {
            if ($request->oldFile) {
                Storage::delete($request->oldFile);
            }
            $validateData['filekatalog'] = $request->file('filekatalog')->store('koleksi-files');
        }
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 100);
        $validateData['title'] = Str::limit(strip_tags($request->title), 35);
        $validateData['author_id'] = implode(', ', $request->author_id);

        Koleksidigital::where('id', $koleksidigital->id)->update($validateData);
        return redirect('/dashboard/koleksidigitals')->with('success', 'Koleksi Digital has been updatedd!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Koleksidigital  $koleksidigital
     * @return \Illuminate\Http\Response
     */
    public function destroy(Koleksidigital $koleksidigital)
    {
        if ($koleksidigital->image) {
                Storage::delete($koleksidigital->image);
            }
        if ($koleksidigital->filekatalog) {
                Storage::delete($koleksidigital->filekatalog);
            }
        Koleksidigital::destroy($koleksidigital->id);
        return redirect('/dashboard/koleksidigitals')->with('success', 'Koleksi Digital has been deleted!');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Koleksidigital::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
