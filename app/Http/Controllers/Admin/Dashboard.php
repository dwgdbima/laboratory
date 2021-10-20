<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\BaseController;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->middleware('role:super-admin|admin');
        $this->addMenuData('Dashboard', route('admin.dashboard.index'));
    }
    public function index()
    {
        return view('web.admin.dashboard.index');
    }
}
