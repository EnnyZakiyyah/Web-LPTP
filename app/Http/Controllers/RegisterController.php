<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            'no_tlpn' => 'required',
            'alamat' => 'required',
            'image_bukti' => 'image|file|max:1024',
            'image_foto' => 'image|file|max:1024',
            'is_admin' => ''
            
        ]);

        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('register-images');
        }

        $validateData['password'] = Hash::make($validateData['password']);
        
        User::create($validateData);

        return redirect('/sign-in')->with('success', 'Registration successfull! Please login');
    }
}
