<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ServiceDataTable;
use App\Http\Controllers\Controller;
use App\Models\Laboratory;
use App\Models\Service;
use App\Models\Unit;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class ServiceController extends BaseController
{
    public function __construct()
    {
        $this->middleware('role:super-admin');
        $this->addMenuData('Layanan', route('admin.services.index'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $services = Service::with(['laboratory', 'unit'])->select('services.*');
            return DataTables::eloquent($services)
            ->addColumn('action', function($service){
                return '<a href="#" onclick="detail('.$service->id.'), event.preventDefault();" class="btn btn-sm btn-info"><i class="fas fa-search"></i></a>
                <a href="#" onclick="edit('.$service->id.'), event.preventDefault();" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                <a href="#" onclick="destroy('.$service->id.'), event.preventDefault();" data-url="#"  class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>';
            })
            ->make(true);
        }

        $laboratories = Laboratory::all();
        $units = Unit::all();

        return view('web.admin.service.index', compact(['laboratories', 'units']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = Service::create($request->all());

        $service->servicePrices()->createMany([
            [
                'customer_status_id' => 1,
                'price' => $request->price1
            ],
            [
                'customer_status_id' => 2,
                'price' => $request->price2
            ],
            [
                'customer_status_id' => 3,
                'price' => $request->price3
            ],
            [
                'customer_status_id' => 4,
                'price' => $request->price4
            ],
        ]);

        Alert::toast('Berhasil Menambah Layanan', 'success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $service->update($request->all());

        $service->servicePrices()->where('customer_status_id', 1)->update(['price' => $request->price1]);
        $service->servicePrices()->where('customer_status_id', 2)->update(['price' => $request->price2]);
        $service->servicePrices()->where('customer_status_id', 3)->update(['price' => $request->price3]);
        $service->servicePrices()->where('customer_status_id', 4)->update(['price' => $request->price4]);

        Alert::toast('Berhasil Mengubah Layanan', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return response()->json($service);
    }
}
