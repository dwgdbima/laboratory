<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\BaseController;
use App\Models\Laboratory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class LaboratoryDetailController extends BaseController
{
    public function __construct()
    {
        $this->middleware('role:super-admin|admin');
        $this->addMenuData('Praktikum', route('admin.tests.index'));
    }

    public function index()
    {
        $laboratory = Laboratory::find(Auth::user()->laboratory->id);
        return view('web.admin.lab-detail.index', compact('laboratory'));
    }

    public function update(Request $request)
    {
        $laboratory = Laboratory::find(Auth::user()->laboratory->id);

        if ($request->hasFile('banner')) {
            $current = Str::replace('storage', 'public', $laboratory->banner);
            if (Storage::exists($current)) {
                Storage::delete($current);
            }
            $file = $request->file('banner');
            $name = 'laboratory/' . date('dmY') . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public', $name);
            $request = new Request($request->all());
            $request->merge(['banner' => 'storage/' . $name]);
        }

        $laboratory->update($request->all());

        Alert::toast('Berhasil Mengubah Data Lab', 'success');

        return redirect()->back();
    }
}
