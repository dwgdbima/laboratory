<?php

namespace App\Http\Controllers\Laboratory;

use App\Http\Controllers\Controller;
use App\Models\Laboratory;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
    protected $laboratory, $slug;

    public function __construct()
    {
        $this->slug = Route::current()->parameter('slug');

        $this->laboratory = Laboratory::where('slug', $this->slug)->first();

        return View::share('laboratory', $this->laboratory);
    }
}
