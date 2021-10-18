<?php

namespace App\Http\Controllers\Laboratory;

use Illuminate\Http\Request;
use App\Http\Controllers\Laboratory\BaseController;

class BlogController extends BaseController
{
    public function index($slug)
    {
        $blogs = $this->laboratory->user->blogs()->paginate(3);
        return view('web.user.laboratory.blog.index', compact('blogs'));
    }
}
