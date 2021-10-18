<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Chairman;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::all()->first();
        $chairman = Chairman::all()->first();
        return view('web.user.about.index', compact('about', 'chairman'));
    }
}
