<?php

namespace App\Http\Controllers\Web\Store;

use App\DTO\Alert\Alert;
use App\Patent;
use App\Http\Controllers\Controller;
use App\Services\Files\FilesLocalServer;
use App\Vehicle;

class StoreController extends Controller
{
    const MAX_VEHICLES_SHOW = 6;

    public function storeMain()
    {
        $patentList = Patent::where('active', 1)->get();

        $vehicleList = Vehicle::where('active', 1)->paginate(self::MAX_VEHICLES_SHOW);

        return view('web.store.storeMainPage', ['patentList' => $patentList, 'vehicleList' => $vehicleList]);
    }

    public function storeDetails($vehicleId, $patentShortName, $vehicleShortName)
    {
        $alertArray = collect();
        $vehicleDetails = Vehicle::find($vehicleId)->where('active', 1)->where('short_name', $vehicleShortName)->first();

        if($vehicleDetails) {
            $fileLocalServer = new FilesLocalServer();
            $allVehicleImages = $fileLocalServer->getAllFilesFromEntity($vehicleDetails);

            $patentList = Patent::where('active', 1)->get();
            $patentDetails = Patent::where('short_name', $patentShortName)->first();

            if($patentDetails->id === $vehicleDetails->patent->id) {
                return view('web.store.productDetailsPage', ['patentList' => $patentList, 'vehicleDetails' => $vehicleDetails, 'vehicleImages' => $allVehicleImages]);
            }
        }
        $alert = new Alert();
        $alert->setDangerType();
        $alert->setMessage(trans('web.vehicle_no_available'));
        $alertArray->push($alert);

        return redirect()->route('storeMain')->with('alertArray', $alertArray);
    }
}
