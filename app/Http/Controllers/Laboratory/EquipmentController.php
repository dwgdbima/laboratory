<?php

namespace App\Http\Controllers\Laboratory;

use Illuminate\Http\Request;
use App\Http\Controllers\Laboratory\BaseController;
use App\Models\Equipment;

class EquipmentController extends BaseController
{
    public function index($slug)
    {
        $equipment = $this->laboratory->equipment;
        return view('web.user.laboratory.equipment.index', compact('equipment'));
    }

    public function show($slug, $id)
    {
        $equipment = Equipment::find($id);
        return view('web.user.laboratory.equipment.show', compact('equipment'));
    }
}
