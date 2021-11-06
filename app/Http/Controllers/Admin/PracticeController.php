<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PracticeDataTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\BaseController;
use App\Http\Requests\StorePracticeRequest;
use App\Http\Requests\UpdatePracticeRequest;
use App\Models\Laboratory;
use App\Models\Practice;
use RealRashid\SweetAlert\Facades\Alert;

class PracticeController extends BaseController
{
    public function __construct()
    {
        $this->middleware('role:super-admin|admin');
        $this->addMenuData('Praktikum', route('admin.tests.index'));
    }

    public function index(PracticeDataTable $dataTable)
    {
        return $dataTable->render('web.admin.practice.index');
    }

    public function store(StorePracticeRequest $request)
    {
        $request->validated();
        if ($this->superAdmin()) {
            $laboratory = Laboratory::find($request->laboratory_id);
            $laboratory->practices()->create($request->all());
        } else {
            auth()->user()->laboratory->practices()->create($request->all());
        }
        Alert::toast('Berhasil Menambah Praktikum', 'success');
        return redirect()->back();
    }

    public function edit(Practice $practice)
    {
        $laboratory = $practice->laboratory;
        return response()->json(['practice' => $practice, 'laboratory' => $laboratory]);
    }

    public function update(UpdatePracticeRequest $request, Practice $practice)
    {
        $request->validated();
        $practice->update($request->all());
        if ($this->superAdmin()) {
            $practice->laboratory_id = $request->laboratory_id;
            $practice->save();
        }
        Alert::toast('Berhasil Menambah Pengujian', 'success');
        return redirect()->back();
    }

    public function destroy(Request $request, Practice $practice)
    {
        $practice->delete();
        return response()->json(['success' => $practice]);
    }
}
