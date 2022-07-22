<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class DashboardContactController extends Controller
{
    public function index(){
        return view('dashboard.contact.index', [
            'title' => 'Contact Us',
            'messages' => ContactUs::latest()->filter(request(['search']))->paginate(5)->withQueryString(),
            'contacts' => ContactUs::where('status', 0)->get()
        ]);
    }

    public function read($id, Request $request){
        $contactUs = ContactUs::findOrFail($id);
        $validateData = $request->validate([
            'status' => '',
        ]);
        ContactUs::where('id', $contactUs->id)->update($validateData);
        // dd($new);
    return redirect('/dashboard/contact-us')->with('success', 'Please read a message');
    }
}

