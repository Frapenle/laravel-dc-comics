<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comic;


class PageController extends Controller
{
    public function home()
    {
        $comics = Comic::all();
        return view('guest.home', compact('comics'));
    }
}
