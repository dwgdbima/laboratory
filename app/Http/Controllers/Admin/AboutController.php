<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\BaseController;
use App\Models\Chairman;
use RealRashid\SweetAlert\Facades\Alert;

class AboutController extends BaseController
{
    public function __construct()
    {
        $this->middleware('role:super-admin');
        $this->addMenuData('Profil', route('admin.abouts.index'));
    }

    public function index()
    {
        $about = About::all()->first();
        $chairman = Chairman::all()->first();
        return view('web.admin.about.index', compact('about', 'chairman'));
    }

    public function update(Request $request)
    {
        if ($request->model == 'about') {
            $about = About::all()->first();
            $about->update($request->all());
        }

        if ($request->model == 'chairman') {
            $chairman = Chairman::all()->first();

            if ($request->hasFile('photo')) {

                $file = $request->file('photo');
                $name = 'chairman.' . $file->getClientOriginalExtension();
                $file->storeAs('public', $name);

                $chairman->photo = 'storage/' . $name;
                $chairman->save();
            }
            $chairman->update($request->all());
        }

        Alert::toast('Ubah Data Berhasil', 'success');

        return redirect()->back();
    }
}
