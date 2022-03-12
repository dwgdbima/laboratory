<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\CustomerStatus;
use App\Models\Laboratory;
use App\Models\Order;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $customerStatuses = CustomerStatus::all();
        $laboratories = Laboratory::whereHas('services')->get();
        return view('web.user.service.index', compact('customerStatuses', 'laboratories'));
    }

    public function show(Service $service)
    {   
        if($service->unit->slug == 'per-hari'){
            if($service->quantity == null || $service == ''){
                $available_service = true;
            }else{
                $available_service = $service->orders()->whereDate('end_date', '>=', Carbon::now())->count() < $service->quantity ? true : false;
            }
        }else{
            if($service->quantity == null || $service == ''){
                $available_service = true;
            }else{
                $available_service = $service->orders()->whereDate('date', '>=', Carbon::now())->count() < $service->quantity ? true : false;
            }
        }

        if(request()->ajax()){
            return response()->json(['service' => $service->load(['laboratory', 'unit', 'servicePrices']), 'available_service' => $available_service]);
        }
    }
}
