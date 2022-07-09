<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\UserApprovedNotification;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.user.index', [
            'title' => 'User',
            'users' => User::latest()->get(),
            'roles'
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('dashboard.user.show', [
            'title' => "Detail User",
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validateData = $request->validate([
            'approved' => '',
        ]);
        
        $user->assignRole('user');
        User::where('id', $user->id)->update($validateData, $user);
        // dd($validateData);
        return redirect('/dashboard/users')->with('success', 'Approved');
        // $approved = $user->approved;

        // $user->update($request->all());
        // $user->roles()->sync($request->input('roles', []));

        // if ($approved == 0 && $user->approved == 2) {
        //     $user->notify(new UserApprovedNotification());
        // }

        // return redirect('/dashboard/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/dashboard/users')->with('success', 'Data User has been deleted!');
    }

    // public function approved(){
    //     dd('berhasil');
    // }
}
