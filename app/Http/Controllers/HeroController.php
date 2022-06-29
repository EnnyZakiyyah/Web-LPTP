<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.hero.index', [
            'title' => "Gambar",
            'hero' => Hero::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.hero.create', [
            'title' => "Tambah Data Gambar"
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
            'slug' => 'unique:heroes',
            'image' => 'required|image|file|max:5120'
        ]);

        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('hero-images');
        }

        Hero::create($validateData);
        return redirect('/dashboard/heroes')->with('success', 'New Picture has been addedd!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hero  $hero
     * @return \Illuminate\Http\Response
     */
    public function show(Hero $hero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hero  $hero
     * @return \Illuminate\Http\Response
     */
    public function edit(Hero $hero)
    {
        return view('dashboard.hero.edit', [
            'title' => "Edit Data Penulis",
            'hero' => $hero,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hero  $hero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hero $hero)
    {
        $rules = ([
            'nama' => 'required|max:255',
        ]);

        if($request->slug != $hero->slug) {
            $rules['slug'] = 'required|unique:heroes';
        }

        // $validateData['author_id'] = auth()->user()->id;
        $validateData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('hero-images');
        }

        Hero::where('id', $hero->id)->update($validateData);
        return redirect('/dashboard/heroes')->with('success', 'Picture has been editedd!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hero  $hero
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hero $hero)
    {
        if ($hero->image) {
            Storage::delete($hero->image);
        }
        Hero::destroy($hero->id);
        return redirect('/dashboard/heroes')->with('success', 'Katalog has been deleted!');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Hero::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
    }
}
