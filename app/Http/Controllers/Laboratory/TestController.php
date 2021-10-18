<?php

namespace App\Http\Controllers\Laboratory;

use App\Http\Controllers\Laboratory\BaseController;
use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends BaseController
{
    public function index($slug)
    {
        $tests = $this->laboratory->tests;
        return view('web.user.laboratory.test.index', compact('tests'));
    }
}
