<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(){
        return view('home.faqs.index', [
            'title' => 'FAQ',
            'faqs' => Faq::all()
        ]);
    }
}
