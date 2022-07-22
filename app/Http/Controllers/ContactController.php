<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Notifications\ContactNotifications;

class ContactController extends Controller
{

    public function showForm(Request $request)
    {
        return view('home.contact.contact', [
            'title' => 'Contact'
        ]);
    }

    public function send(Request $request)
    {
        //validate
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'phone' => 'required',
            'pesan' => 'required'
        ]);

        if ($this->isOnline()) {
            $mail_data = [
                'recipient' => 'lptp.surakarta.solo@gmail.com',
                'fromEmail' => $request->email,
                'fromName' => $request->name,
                'phone' => $request->phone,
                'subject' => $request->subject,
                'body' => $request->pesan
            ];

            $user = ContactUs::create($request->all());
            $administrators = User::whereHas('roles', function($q){
                $q->where('name', 'admin');
            })->get();
            foreach ($administrators as $administrator) {
                $administrator->notify(new ContactNotifications($user));
            }

            return redirect()->back()->with('success', 'Email Sent!');
            // return 'connect';
        } else {
            return redirect()->back()->withInput()->with('error', 'Check your internet connection');
            // return 'error';
        }
    }

    public function isOnline($site = "https://youtube.com/")
    {
        if (@fopen($site, "r")) {
            return true;
        } else {
            return false;
        }
    }
}
