<?php

namespace App\Exports;

use App\Http\Models\Vehicle;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class VehicleExport implements FromView
{
    public function view(): View
    {
        $vehicles = Vehicle::join('vehicle_type','vehicle_type.id_vehicle_type','vehicle.vehicle_type_id_vehicle_type')
            ->select('vehicle.*','vehicle_type.vehicle_type as vehicle_type')
            ->get();

        return view('reportes.excel.vehicle',compact('vehicles'));
    }
}
