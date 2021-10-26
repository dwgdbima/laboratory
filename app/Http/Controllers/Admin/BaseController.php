<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
    protected $menuData = [];

    public function addMenuData($title, $route)
    {
        $data = [
            'title' => $title,
            'route' => $route
        ];

        array_push($this->menuData, $data);

        return View::share('menuData', $this->menuData);
    }

    public function superAdmin()
    {
        if (auth()->user()->hasRole('super-admin')) {
            return true;
        }
        return false;
    }
}
