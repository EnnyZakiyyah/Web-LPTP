<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardFaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.faqs.index', [
            'title' => 'FAQ',
            'faqs' => Faq::latest()->filter(request(['search']))->paginate(5)->withQueryString(),
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
        return view('dashboard.faqs.create', [
            'title' => 'FAQ',
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
            'slug' => 'required|unique:faqs',
            'pertanyaan' => 'required'
        ]);

        Faq::create($validateData);
        return redirect('/dashboard/faqs')->with('success', 'New Faq has been addedd!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        return view('dashboard.faqs.edit', [
            'title' => "Edit Data Faq",
            'faq' =>$faq,
            'contacts' => ContactUs::where('status', 0)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
    {
        $rules = ([
            'name' => 'required|max:255',
            'slug' => 'required|unique:faqs',
            'pertanyaan' => 'required',
        ]);

        if($request->slug != $faq->slug) {
            $rules['slug'] = 'unique:faqs';
        }

        $validateData = $request->validate($rules);

        Faq::where('id', $faq->id)->update($validateData);
        return redirect('/dashboard/faqs')->with('success', 'Faq has been editedd!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        Faq::destroy($faq->id);
        return redirect('/dashboard/faqs')->with('success', 'Faq has been deleted!');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Faq::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
