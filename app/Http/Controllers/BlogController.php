<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BlogController extends Controller
{
    public function __construct()
    {
        $categories = Category::withCount('blogs')->orderBy('name')->get();
        $recentPosts = Blog::where('publish', true)->latest()->take(3)->get();
        $tags = Tag::popular()->get();

        View::share('categories', $categories);
        View::share('recentPosts', $recentPosts);
        View::share('tags', $tags);
    }

    public function index(Request $request)
    {
        $blogs = Blog::where('publish', true);
        if ($term = $request->term) {
            $blogs = $blogs->where('title', 'Like', '%' . $term . '%');
        }
        $blogs = $blogs->latest()->paginate(3);
        return view('web.user.blog.index', compact('blogs'));
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        return view('web.user.blog.show', compact('blog'));
    }

    public function category($slug)
    {
        $blogs = Category::where('slug', $slug)->first()->blogs()->latest()->paginate(3);
        return view('web.user.blog.index', compact('blogs'));
    }

    public function tag($slug)
    {
        $blogs = Tag::where('slug', $slug)->first()->blogs()->latest()->paginate(3);
        return view('web.user.blog.index', compact('blogs'));
    }
}
