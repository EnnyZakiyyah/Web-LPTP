<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Lokasi;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Bibliography;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardBibliographyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.layanan.bibliography.index', [
            'title' => "Bibliography",
            'bibliographies' => Bibliography::latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.layanan.bibliography.create', [
            'title' => "Tambah Data Bibliography",
            'categories' => Category::all(),
            'authors' => Author::all(),
            'lokasis' => Lokasi::all()
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
            'slug' => 'required|unique:bibliographies',
            'category_id' => 'required',
            'author_id' => '',
            'body' => 'required',
            'edisi' => '',
            'isbn' => '',
            'penerbit' => '',
            'tahun_terbit' => '',
            'tempat_terbit' => '',
            'jumlah' => 'required',
            'bahasa' => '',
            'lokasi_id' => '',
            'image' => 'image|file|max:2048'
        ]);

        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('bibliographies-images');
        }
        $validateData['title'] = Str::limit(strip_tags($request->title), 35);
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 100);

        Bibliography::create($validateData);
        return redirect('/dashboard/layanan/bibliography')->with('success', 'New Biblioraphy has been addedd!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bibliography  $bibliography
     * @return \Illuminate\Http\Response
     */
    public function show(Bibliography $bibliography)
    {
        return view('dashboard.layanan.bibliography.show', [
            'title' => "Detail Bibliography",
            'bibliography' => $bibliography
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bibliography  $bibliography
     * @return \Illuminate\Http\Response
     */
    public function edit(Bibliography $bibliography)
    {
        return view('dashboard.layanan.bibliography.edit', [
            'title' => "Edit Data Bibliography",
            'bibliography' =>$bibliography,
            'categories' => Category::all(),
            'authors' => Author::all(),
            'lokasis' => Lokasi::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bibliography  $bibliography
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bibliography $bibliography)
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
            'jumlah' => 'required',
            'bahasa' => '',
            'lokasi_id' => '',
            'author_id' => '',
            'image' =>'image|file|max:5120'
        ]);

        if($request->slug != $bibliography->slug) {
            $rules['slug'] = 'required|unique:bibliographies';
        }

        // $validateData['author_id'] = auth()->user()->id;
        $validateData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('bibliographies-images');
        }
        
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 100);

        Bibliography::where('id', $bibliography->id)->update($validateData);
        return redirect('/dashboard/layanan/bibliography/')->with('success', 'Bibliography has been updatedd!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bibliography  $bibliography
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bibliography $bibliography)
    {
        if ($bibliography->image) {
            Storage::delete($bibliography->image);
        }
    Bibliography::destroy($bibliography->id);
    return redirect('/dashboard/layanan/bibliography')->with('success', 'Bibliography has been deleted!');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Bibliography::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
