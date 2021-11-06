<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TestDataTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\BaseController;
use App\Http\Requests\StoreTestRequest;
use App\Http\Requests\UpdateTestRequest;
use App\Models\Laboratory;
use App\Models\Test;
use RealRashid\SweetAlert\Facades\Alert;

class TestController extends BaseController
{
    public function __construct()
    {
        $this->middleware('role:super-admin|admin');
        $this->addMenuData('Pengujian', route('admin.tests.index'));
    }

    public function index(TestDataTable $dataTable)
    {
        return $dataTable->render('web.admin.test.index');
    }

    public function store(StoreTestRequest $request)
    {
        $request->validated();

        if ($this->superAdmin()) {
            $laboratory = Laboratory::find($request->laboratory_id);
            $laboratory->tests()->create($request->all());
        } else {
            auth()->user()->laboratory->tests()->create($request->all());
        }
        Alert::toast('Berhasil Menambah Pengujian', 'success');
        return redirect()->back();
    }

    public function edit(Test $test)
    {
        $laboratory = $test->laboratory;
        return response()->json(['test' => $test, 'laboratory' => $laboratory]);
    }

    public function update(UpdateTestRequest $request, Test $test)
    {
        $request->validated();

        $test->update($request->all());
        if ($this->superAdmin()) {
            $test->laboratory_id = $request->laboratory_id;
            $test->save();
        }
        Alert::toast('Berhasil Menambah Pengujian', 'success');
        return redirect()->back();
    }

    public function destroy(Request $request, Test $test)
    {
        $test->delete();
        return response()->json(['success' => $test]);
    }
}
