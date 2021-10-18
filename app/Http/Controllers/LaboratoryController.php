<?php

namespace App\Http\Controllers;

use App\Models\Laboratory;
use Illuminate\Http\Request;

class LaboratoryController extends Controller
{
    public function index($slug)
    {
        $laboratory = Laboratory::where('slug', $slug);
        return view('web.user.laboratory.equipment.index', compact('laboratory'));
    }
}
