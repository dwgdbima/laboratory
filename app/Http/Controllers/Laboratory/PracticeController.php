<?php

namespace App\Http\Controllers\Laboratory;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Laboratory\BaseController;
use Illuminate\Http\Request;

class PracticeController extends BaseController
{
    public function index($slug)
    {
        $practices = $this->laboratory->practices;
        return view('web.user.laboratory.practice.index', compact('practices'));
    }
}
