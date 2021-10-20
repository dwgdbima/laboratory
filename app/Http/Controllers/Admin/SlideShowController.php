<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\BaseController;
use App\Models\SlideShow;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class SlideShowController extends BaseController
{
    public function __construct()
    {
        $this->middleware('role:super-admin');
        $this->addMenuData('Slide Show', route('admin.abouts.index'));
    }

    public function index()
    {
        $slideshow = SlideShow::all()->first();
        return view('web.admin.slideshow.index', compact('slideshow'));
    }

    public function update(Request $request)
    {
        $slideshow = SlideShow::all()->first();

        if ($request->hasFile('slide_1')) {

            $file = $request->file('slide_1');
            $name = 'slide_1.' . $file->getClientOriginalExtension();
            if (Storage::exists('public/' . $name)) {
                Storage::delete('public/' . $name);
            }
            $file->storeAs('public', $name);

            $slideshow->slide_1 = 'storage/' . $name;
            $slideshow->save();
        }

        if ($request->hasFile('slide_2')) {

            $file = $request->file('slide_2');
            $name = 'slide_2.' . $file->getClientOriginalExtension();
            if (Storage::exists('public/' . $name)) {
                Storage::delete('public/' . $name);
            }
            $file->storeAs('public', $name);

            $slideshow->slide_2 = 'storage/' . $name;
            $slideshow->save();
        }

        Alert::toast('Gambar Slideshow Berhasil Diubah', 'success');
        return redirect()->back();
    }
}
