<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardAuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.authors.index', [
            'title' => "Penulis",
            'author' => Author::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.authors.create', [
            'title' => "Tambah Data Penulis"
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
            'slug' => 'required|unique:authors'
        ]);

        Author::create($validateData);
        return redirect('/dashboard/authors')->with('success', 'New Author has been addedd!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('dashboard.authors.edit', [
            'title' => "Edit Data Penulis",
            'author' =>$author,
        ]);
        //return $author;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $validateData = $request->validate([
            'nama' => 'required|max:255',
            'slug' => 'required|unique:authors'
        ]);

        Author::where('id', $author->id)->update($validateData);
        return redirect('/dashboard/authors')->with('success', 'Author has been editedd!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        Author::destroy($author->id);
        return redirect('/dashboard/authors')->with('success', 'Authors has been deleted!');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Author::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
    }
}
