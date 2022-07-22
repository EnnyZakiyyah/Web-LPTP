<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\Author;
use App\Models\Lokasi;
use App\Models\Katalog;
use App\Models\Category;
use App\Models\ContactUs;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            'katalogs' => Katalog::latest()->filter(request(['search']))->paginate(5)->withQueryString(),
            'contacts' => ContactUs::where('status', 0)->get()
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
            'categories' => Category::all(),
            'labels' => Label::all(),
            'authors' => Author::all(),
            'lokasis' => Lokasi::all(),
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
        // dd($request->all());
        // $input = $request->all();
        // $author = $input['author_id'];
        $validateData = $request->validate([
            'title' => 'required|max:50',
            'slug' => 'required|unique:katalogs',
            'category_id' => 'required',
            'label_id' => 'required',
            'author_id' => '',
            'body' => 'required',
            'edisi' => '',
            'isbn' => 'required|unique:katalogs',
            'penerbit' => '',
            'tahun_terbit' => '',
            'tempat_terbit' => '',
            'jumlah' => 'required',
            'bahasa' => '',
            'lokasi_id' => '',
            'image' => 'image|file|max:2048'
        ]);
        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('katalog-images');
        }
        $validateData['author_id'] = implode(', ', $request->author_id);
        $validateData['title'] = Str::limit(strip_tags($request->title), 35);
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 100);
        // dd($validateData);
        Katalog::create($validateData);
        // Katalog::create([
            
        // ]);
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
            'katalog' => $katalog,
            'contacts' => ContactUs::where('status', 0)->get()
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
            'categories' => Category::all(),
            'labels' => Label::all(),
            'authors' => Author::all(),
            'lokasis' => Lokasi::all(),
            'contacts' => ContactUs::where('status', 0)->get()
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
            'title' => 'required|max:50',    
            'category_id' => 'required',
            'label_id' => 'required',
            'body' => 'required',
            'edisi' => '',
            // 'isbn' => 'required|unique:katalogs',
            'penerbit' => '',
            'tahun_terbit' => '',
            'tempat_terbit' => '',
            'jumlah' => 'required',
            'bahasa' => '',
            'lokasi_id' => '',
            'author_id' => '',
            'image' =>'image|file|max:5120'
        ]);

        if($request->slug != $katalog->slug) {
            $rules['slug'] = 'required|unique:katalogs';
        }

        if($request->isbn != $katalog->isbn) {
            $rules['isbn'] = 'required|unique:katalogs';
        }

        // $validateData['author_id'] = auth()->user()->id;
        $validateData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('katalog-images');
        }
        $validateData['author_id'] = implode(', ', $request->author_id);
        $validateData['title'] = Str::limit(strip_tags($request->title), 35);
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 100);

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
       
            if ($katalog->image) {
                Storage::delete($katalog->image);
            }
        Katalog::destroy($katalog->id);
        return redirect('/dashboard/sirkulasi/katalogs')->with('success', 'Katalog has been deleted!');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Katalog::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
