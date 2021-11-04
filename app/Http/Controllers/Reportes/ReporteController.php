<?php

namespace App\Http\Controllers\Reportes;

use App\Exports\ProviderExport;
use App\Exports\UsuarioExport;
use App\Exports\VehicleExport;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReporteController extends Controller
{
    private static $VEHICLES = 0;
    private static $PROVIDERS = 2;
    private static $USERS = 1;

    private static $EXCEL = 1;
    private static $PDF = 2;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('reportes.index');
    }

    public function export(Request $request)
    {

        $hoy = date('d-m-Y', strtotime(Carbon::now()));
        if($request->exportType == self::$EXCEL)
            return self::selectCollectionExcelExport($request->collection,$hoy);
        else
            return $request;
    }

    private static function selectCollectionExcelExport($collection,$hoy){
        if($collection == self::$VEHICLES)
            return self::exportExcelVehicles($hoy);
        elseif($collection == self::$USERS)
            return self::exportExcelUsers($hoy);
        elseif($collection == self::$PROVIDERS)
            return self::exportExcelProviders($hoy);
        else
            return 0;
    }

    private static function exportExcelVehicles($hoy){
        return Excel::download(new VehicleExport(),'Vehiculos-'.$hoy.'.xlsx');
    }

    private static function exportExcelUsers($hoy){
        return Excel::download(new UsuarioExport(),'Usuarios-'.$hoy.'.xlsx');
    }

    private static function exportExcelProviders($hoy){
        return Excel::download(new ProviderExport(),'Proveedores-'.$hoy.'.xlsx');
    }
}
