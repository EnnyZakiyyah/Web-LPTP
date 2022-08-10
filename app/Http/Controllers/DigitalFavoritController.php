<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Digitalfavorit;

class DigitalFavoritController extends Controller
{
    public function baca($id)
    {
        $digitalfavorit = Digitalfavorit::findOrFail($id);
        dd($digitalfavorit);
    }
}
