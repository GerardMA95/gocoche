<?php

namespace App\Http\Controllers\Web\Main;

use App\Services\Utils\Search\BuildSearchCriteria;
use App\Vehicle;
use App\Http\Controllers\Controller;

class WebMainController extends Controller
{
    public function main()
    {
        $builderSearchCriteria = new BuildSearchCriteria();
        $searchCriteria = $builderSearchCriteria->buildDefault();

        $vehicleHighlightedList = Vehicle::where('active', 1)->where('highlighted', 1)->get();

        return view('web.main.main', ['searchCriteria' => $searchCriteria, 'vehicleHighlightedList' => $vehicleHighlightedList]);
    }
}
