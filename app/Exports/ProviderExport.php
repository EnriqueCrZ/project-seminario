<?php

namespace App\Exports;

use App\Http\Models\Provider;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProviderExport implements FromView
{
    public function view(): View
    {
        $providers = Provider::all();

        return view('reportes.excel.provider',compact('providers'));
    }
}
