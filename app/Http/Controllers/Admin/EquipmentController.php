<?php

namespace App\Http\Controllers\Admin;

use App\Models\Equipment;
use Illuminate\Http\Request;
use App\DataTables\EquipmentDataTable;
use App\Http\Controllers\Admin\BaseController;
use App\Http\Requests\StoreEquipmentRequest;
use App\Http\Requests\UpdateEquipmentRequest;
use App\Models\Laboratory;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class EquipmentController extends BaseController
{
    public function __construct()
    {
        $this->middleware('role:super-admin|admin');
        $this->addMenuData('Peralatan', route('admin.equipment.index'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EquipmentDataTable $dataTable)
    {
        return $dataTable->render('web.admin.equipment.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->addMenuData('Tambah Peralatan', route('admin.equipment.create'));
        $laboratories = Laboratory::all();
        return view('web.admin.equipment.create', compact('laboratories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEquipmentRequest $request)
    {
        $request->validated();

        $file = $request->file('image');
        $name = 'equipment/' . date('dmY') . Str::random(10) . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public', $name);
        $request = new Request($request->all());
        $request->merge(['image' => 'storage/' . $name]);
        if ($this->superAdmin()) {
            $laboratory = Laboratory::find($request->laboratory_id);
            $laboratory->equipment()->create($request->all());
        } else {
            auth()->user()->laboratory->equipment()->create($request->all());
        }

        Alert::toast('Berhasil Menambah Data Peralatan', 'success');

        return redirect()->route('admin.equipment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function show(Equipment $equipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipment $equipment)
    {
        $this->addMenuData('Edit Peralatan', route('admin.equipment.edit', $equipment->id));
        return view('web.admin.equipment.edit', compact('equipment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEquipmentRequest $request, Equipment $equipment)
    {
        $request->validated();

        if ($request->hasFile('image')) {
            $current = Str::replace('storage', 'public', $equipment->image);
            if (Storage::exists($current)) {
                Storage::delete($current);
            }
            $file = $request->file('image');
            $name = 'equipment/' . date('dmY') . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public', $name);
            $request = new Request($request->all());
            $request->merge(['image' => 'storage/' . $name]);
        }
        if ($this->superAdmin()) {
            $equipment->laboratory_id = $request->laboratory_id;
            $equipment->save();
        }
        $equipment->update($request->all());

        Alert::toast('Berhasil Mengubah Data Peralatan', 'success');

        return redirect()->route('admin.equipment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipment $equipment)
    {
        $image = Str::replace('storage', 'public', $equipment->image);
        if (Storage::exists($image)) {
            Storage::delete($image);
        }
        $equipment->delete();

        return response()->json(['status' => 'success']);
    }
}
