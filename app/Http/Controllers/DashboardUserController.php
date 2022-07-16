<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\UserApprovedNotification;
use App\Notifications\UserRejectedNotification;

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
            'users' => User::latest()->paginate(5),
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
            // 'id_petugas_approved' => auth()->user()->id,
        ]);
        $user->assignRole('user');
        User::where('id', $user->id)->update($validateData, $user);
        $users = User::where('id', auth()->user()->id);
        $user->notify(new UserApprovedNotification($users));
        return redirect('/dashboard/users')->with('success', 'User has been Approved!');
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

    public function ditolak(Request $request, $id){
        $this->validate($request, [
            'approved' => '',
        ]);
        $reject = User::findOrFail($id);
        $reject->update([
            'approved' => $request->approved,
            $users = User::where('id', auth()->user()->id),
            $reject->notify(new UserRejectedNotification($users))
        ]);
        return redirect('/dashboard/users')->with('success', 'User has been Approved!');
    }
}
