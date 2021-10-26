<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategories(Request $request)
    {
        $search = $request->search;

        if ($search == '') {
            $categories = Category::orderby('name', 'asc')->get();
        } else {
            $categories = Category::orderby('name', 'asc')->where('name', 'like', '%' . $search . '%')->get();
        }

        $response = array();
        foreach ($categories as $category) {
            $response[] = array(
                "id" => $category->name,
                "text" => $category->name
            );
        }
        return response()->json($response);
    }
}
