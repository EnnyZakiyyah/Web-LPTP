<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class DashboardContactController extends Controller
{
    public function index(){
        return view('dashboard.contact.index', [
            'title' => 'Contact Us',
            'contacts' => ContactUs::latest()->get()
        ]);
    }
}

