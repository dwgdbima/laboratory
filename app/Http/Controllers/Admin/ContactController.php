<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\BaseController;
use App\Models\Contact;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends BaseController
{
    public function __construct()
    {
        $this->middleware('role:super-admin');
        $this->addMenuData('Kontak', route('admin.abouts.index'));
    }

    public function index()
    {
        $contact = Contact::all()->first();
        return view('web.admin.contact.index', compact('contact'));
    }

    public function update(Request $request)
    {
        $contact = Contact::all()->first();
        $contact->update($request->all());

        Alert::toast('Data Berhasil Diubah', 'success');

        return redirect()->back();
    }
}
