<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $about = About::find(1);
        return view('web.user.index', ['about' => $about]);
    }
}
