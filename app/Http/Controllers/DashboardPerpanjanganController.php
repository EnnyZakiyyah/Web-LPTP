<?php

namespace App\Http\Controllers;

use App\Models\Perpanjangan;
use Illuminate\Http\Request;

class DashboardPerpanjanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.sirkulasi.perpanjangan.index', [
            'title' => 'Ajuan Perpanjangan',
            'perpanjangans' => Perpanjangan::latest()->get()
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
     * @param  \App\Models\Perpanjangan  $perpanjangan
     * @return \Illuminate\Http\Response
     */
    public function show(Perpanjangan $perpanjangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perpanjangan  $perpanjangan
     * @return \Illuminate\Http\Response
     */
    public function edit(Perpanjangan $perpanjangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perpanjangan  $perpanjangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perpanjangan $perpanjangan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perpanjangan  $perpanjangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perpanjangan $perpanjangan)
    {
        Perpanjangan::destroy($perpanjangan->id);
        return redirect('/dashboard/ajuan-perpanjangan')->with('success', 'Data Ajuan has been deleted!');
    }
}
