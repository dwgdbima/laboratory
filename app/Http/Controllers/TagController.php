<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function getTags(Request $request)
    {
        $search = $request->search;

        if ($search == '') {
            $tags = Tag::orderby('name', 'asc')->get();
        } else {
            $tags = Tag::orderby('name', 'asc')->where('name', 'like', '%' . $search . '%')->get();
        }

        $response = array();
        foreach ($tags as $tag) {
            $response[] = array(
                "id" => $tag->name,
                "text" => $tag->name
            );
        }

        return response()->json($response);
    }
}
