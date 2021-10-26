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

    public function getLaboratories(Request $request)
    {
        $search = $request->search;

        if ($search == '') {
            $laboratories = Laboratory::orderby('name', 'asc')->get();
        } else {
            $laboratories = Laboratory::orderby('name', 'asc')->where('name', 'like', '%' . $search . '%')->get();
        }

        $response = array();
        foreach ($laboratories as $laboratory) {
            $response[] = array(
                "id" => $laboratory->id,
                "text" => $laboratory->name
            );
        }

        return response()->json($response);
    }
}
