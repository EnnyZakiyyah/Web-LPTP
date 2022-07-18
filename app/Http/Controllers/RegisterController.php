<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Notifications\AdminNewUserNotification;

class RegisterController extends Controller
{
    public function index(){
        return view('sign.sign-up', [
            'title' => 'Sign-Up'
        ]);
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'no_ktp' => 'required|unique:users',
            'tempat_lahir' => 'required',
            'jk' => '',
            'tgl_lahir' => 'required',
            'email' => 'required|email:dns|unique:users',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'password' =>'required|min:5|max:255',
            'phone_number' => 'required',
            'alamat' => 'required',
            'unit_kerja' => 'required',
            'image_bukti' => 'image|file|max:2048',
            'image_foto' => 'image|file|max:2048',
            'is_admin' => '',
            'approved' => ''
            
        ]);

        if ($request->file('image_foto')) {
            $validateData['image_foto'] = $request->file('image_foto')->store('register-images');
        }

        if ($request->file('image_bukti')) {
            $validateData['image_bukti'] = $request->file('image_bukti')->store('register-images');
        }

        $validateData['password'] = Hash::make($validateData['password']);
        
        $user = User::create($validateData);
        $administrators = User::whereHas('roles', function($q){
            $q->where('name', 'admin');
        })->get();
        foreach ($administrators as $administrator) {
            $administrator->notify(new AdminNewUserNotification($user));
        }

        // return $user;
        return redirect('/sign-in')->with('success', 'Registrati Berhasil! Tunggu Konfirmasi dari Admin. Paling lambat 1x24 jam dihari kerja');
    }
}
