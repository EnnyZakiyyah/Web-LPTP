<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
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

            Mail::send('home.contact.email-template', $mail_data, function ($message) use ($mail_data) {
                $message->to($mail_data['recipient'])
                    ->from($mail_data['fromEmail'], $mail_data['fromName'])
                    ->subject($mail_data['subject']);
            });

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
