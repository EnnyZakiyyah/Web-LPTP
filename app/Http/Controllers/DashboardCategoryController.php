<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.category.index', [
            'title' => 'Category',
            'categories' => Category::latest()->filter(request(['search']))->paginate(5)->withQueryString(),
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
        return view('dashboard.category.create', [
            'title' => "Tambah Data Category",
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
            'name' => 'required|max:255',
            'slug' => 'required|unique:categories',
        ]);

        Category::create($validateData);
        return redirect('/dashboard/categories')->with('success', 'New Category has been addedd!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('dashboard.category.edit', [
            'title' => "Edit Data Category",
            'category' =>$category,
            'contacts' => ContactUs::where('status', 0)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $rules = ([
            'name' => 'required|max:255',
            'slug' => 'required|unique:categories',
        ]);

        if($request->slug != $category->slug) {
            $rules['slug'] = 'unique:categories';
        }

        $validateData = $request->validate($rules);

        Category::where('id', $category->id)->update($validateData);
        return redirect('/dashboard/categories')->with('success', 'Category has been editedd!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);
        return redirect('/dashboard/categories')->with('success', 'Category has been deleted!');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
