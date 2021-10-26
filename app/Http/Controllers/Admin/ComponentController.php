<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\BaseController;
use App\Models\Component;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ComponentController extends BaseController
{
    public function __construct()
    {
        $this->middleware('role:super-admin');
        $this->addMenuData('Komponen', route('admin.component.index'));
    }

    public function index()
    {
        $component = Component::all()->first();
        return view('web.admin.component.index', compact('component'));
    }

    public function update(Request $request)
    {
        $component = Component::all()->first();

        if ($request->hasFile('icon')) {

            $file = $request->file('icon');
            $name = 'icon.' . $file->getClientOriginalExtension();
            if (Storage::exists('public/' . $name)) {
                Storage::delete('public/' . $name);
            }
            $file->storeAs('public', $name);

            $component->icon = 'storage/' . $name;
            $component->save();
        }

        if ($request->hasFile('favicon')) {

            $file = $request->file('favicon');
            $name = 'favicon.' . $file->getClientOriginalExtension();
            if (Storage::exists('public/' . $name)) {
                Storage::delete('public/' . $name);
            }
            $file->storeAs('public', $name);

            $component->favicon = 'storage/' . $name;
            $component->save();
        }

        if ($request->hasFile('banner')) {

            $file = $request->file('banner');
            $name = 'banner.' . $file->getClientOriginalExtension();
            if (Storage::exists('public/' . $name)) {
                Storage::delete('public/' . $name);
            }
            $file->storeAs('public', $name);

            $component->banner = 'storage/' . $name;
            $component->save();
        }

        Alert::toast('Gambar Slideshow Berhasil Diubah', 'success');
        return redirect()->back();
    }
}
