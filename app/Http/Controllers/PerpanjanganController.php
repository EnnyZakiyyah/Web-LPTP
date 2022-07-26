<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Peminjaman;
use App\Models\Perpanjangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PerpanjanganController extends Controller
{
    public function showForm(Request $request)
    {
        return view('home.sirkulasi.perpanjangan', [
            'title' => 'Perpanjangan'
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
                'subject' => 'Ajuan Perpanjangan',
                'body' => $request->pesan
            ];

            Perpanjangan::create($request->all());
            Mail::send('home.sirkulasi.email-template-perpanjangan', $mail_data, function ($message) use ($mail_data) {
                $message->to($mail_data['recipient'])
                    ->from($mail_data['fromEmail'], $mail_data['fromName'])
                    ->subject($mail_data['subject']);
            });

            return redirect()->back()->with('success', 'Ajuan Perpanjangan Sent!');
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

    public function perpanjangan(Peminjaman $peminjaman, Request $request)
    {
        if ($peminjaman->id_kondisi == 1 || $peminjaman->id_kondisi == 2 ) {
            return redirect('/home/sirkulasi/peminjaman-buku')->with('loginError', 'Maaf anda tidak dapat melakukan perpanjangan karena sudah diproses pengembalian');
        }
        elseif (Carbon::create($peminjaman->tgl_kembali)->lessThan(now())) {
            // dd('berhasil');
            $validateData = $request->validate([
                'id_perpanjangan' => '',
            ]);
            Peminjaman::where('id', $peminjaman->id)->update($validateData);
            return redirect('/home/sirkulasi/peminjaman-buku')->with('success', 'Perpanjangan Buku sedang di ajukan! tunggu konfirmasi kembali paling lambat 1x24 jam dihari kerja');
        } else {
        return redirect('/home/sirkulasi/peminjaman-buku')->with('loginError', 'Perpanjangan Buku bisa dilakukan H-1 Pengembalian');}
    }
}
