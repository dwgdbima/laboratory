<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Laboratory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\DataTables\LaboratoryDataTable;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Admin\BaseController;
use App\Http\Requests\StoreLaboratoryRequest;
use App\Http\Requests\UpdateLaboratoryRequest;

class LaboratoryController extends BaseController
{
    public function __construct()
    {
        $this->middleware('role:super-admin');
        $this->addMenuData('Manajemen Lab', route('admin.laboratories.index'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(LaboratoryDataTable $dataTable)
    {
        return $dataTable->render('web.admin.laboratory.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLaboratoryRequest $request)
    {
        $request->validated();

        $user = User::create($request->all());
        $user->name = 'Admin ' . $request->name;
        $user->save();

        $user->laboratory()->create([
            'name' => $request->name,
            'slug' => $request->name
        ]);

        Alert::toast('Berhasil Menambah ' . $user->laboratory->name, 'success');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laboratory  $laboratory
     * @return \Illuminate\Http\Response
     */
    public function edit(Laboratory $laboratory)
    {
        return response()->json(['laboratory' => $laboratory->load('user')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laboratory  $laboratory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLaboratoryRequest $request, Laboratory $laboratory)
    {
        $request->validated();

        $laboratory->update([
            'name' => $request->name,
            'slug' => $request->name,
        ]);

        $laboratory->user()->update([
            'name' => 'Admin ' . $request->name,
            'email' => $request->email,
        ]);
        if ($request->password) {
            $laboratory->user()->update(['password' => $request->password]);
        }

        Alert::toast('Berhasil Mengubah Data', 'success');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laboratory  $laboratory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laboratory $laboratory)
    {
        $laboratory->delete();

        return response()->json(['success' => true]);
    }
}
