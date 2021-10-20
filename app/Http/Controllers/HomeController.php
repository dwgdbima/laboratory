<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Laboratory;
use App\Models\SlideShow;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $about = About::find(1);
        $slideshow = SlideShow::all()->first();
        $contact = Contact::all()->first();
        $laboratories = Laboratory::all();
        $blogs = Blog::where('publish', true)->take(6)->get();
        return view('web.user.home.index', compact('about', 'laboratories', 'contact', 'blogs', 'slideshow'));
    }
}
