<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Notifications\UserApprovalSMS;
use Illuminate\Support\Facades\Notification;
use App\Notifications\UserApprovedNotification;
use App\Notifications\UserRejectedNotification;
use App\Notifications\WhatsAppApproval;

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
            'users' => User::latest()->filter(request(['search']))->paginate(5)->withQueryString(),
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
            'user' => $user,
            'contacts' => ContactUs::where('status', 0)->get()
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
        $user->update([
            'id_petugas_approved' => auth()->user()->id,
        ]);
        $users = User::where('id', auth()->user()->id);
        $user->notify(new UserApprovedNotification($users));
        $user->notify(new WhatsAppApproval($users));
        $user->notify(new UserApprovalSMS($users));
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
            'alasan' => '',
        ]);
        $reject = User::findOrFail($id);
        $reject->update([
            'approved' => $request->approved,
            'alasan' => $request->alasan,
            'id_petugas_approved' => auth()->user()->id,
            $users = User::where('id', auth()->user()->id),
            $reject->notify(new UserRejectedNotification($users)),
            $reject->notify(new WhatsAppApproval($users)),
            $reject->notify(new UserApprovalSMS($users))
        ]);
        return redirect('/dashboard/users')->with('success', 'User has been Approved!');
    }

    public function register($id)
    {
        if ($id) {
            auth()->user()->unreadnotifications->where('id', $id)->markAsRead();
        }
        return redirect('/dashboard/users');
    }
}
