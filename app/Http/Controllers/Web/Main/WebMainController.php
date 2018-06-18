<?php

namespace App\Http\Controllers\Web\Main;

use App\Patent;
use App\Vehicle;
use App\Http\Controllers\Controller;

class WebMainController extends Controller
{
    public function main()
    {
        $patentList = Patent::where('active', 1)->get();

        $vehicleHighlightedList = Vehicle::where('active', 1)->where('highlighted', 1)->get();

        return view('web.main.main', ['patentList' => $patentList, 'vehicleHighlightedList' => $vehicleHighlightedList]);
    }
}
