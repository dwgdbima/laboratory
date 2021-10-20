<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BlogDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\BaseController;

class BlogController extends BaseController
{
    public function __construct()
    {
        $this->middleware('role:super-admin|admin');
        $this->addMenuData('Berita', route('admin.abouts.index'));
    }

    public function index(BlogDataTable $dataTable)
    {
        return $dataTable->render('web.admin.blog.index');
    }
}
