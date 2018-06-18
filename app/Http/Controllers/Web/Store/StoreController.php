<?php

namespace App\Http\Controllers\Web\Store;

use App\DTO\Alert\Alert;
use App\DTO\Search\SearchCriteria;
use App\Http\Requests\Web\Search\SearchCriteriaRequest;
use App\Patent;
use App\Http\Controllers\Controller;
use App\Services\Files\FilesLocalServer;
use App\Services\Utils\Search\BuildSearchCriteria;
use App\Vehicle;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    const MAX_VEHICLES_SHOW = 6;

    public function storeMain()
    {
        $builderSearchCriteria = new BuildSearchCriteria();
        $searchCriteria = $builderSearchCriteria->buildDefault();

        return view('web.store.storeMainPage', ['searchCriteria' => $searchCriteria]);
    }

    public function storeFiltered(SearchCriteriaRequest $request){
        $validated = $request->validated();

        $builderSearchCriteria = new BuildSearchCriteria();
        $searchCriteria = $builderSearchCriteria->buildByValidatedSearchCriteriaRequest($validated);

        return view('web.store.storeMainPage', ['searchCriteria' => $searchCriteria]);
    }

    public function storeDetails($vehicleId, $patentShortName, $vehicleShortName)
    {
        $alertArray = collect();
        $vehicleDetails = Vehicle::where('id', $vehicleId)->where('active', 1)->first();

        if($vehicleDetails) {
            $fileLocalServer = new FilesLocalServer();
            $allVehicleImages = $fileLocalServer->getAllFilesFromEntity($vehicleDetails);

            $builderSearchCriteria = new BuildSearchCriteria();
            $searchCriteria = $builderSearchCriteria->buildDefault();

            $patentDetails = Patent::where('short_name', $patentShortName)->first();

            if($patentDetails->id === $vehicleDetails->patent->id) {
                return view('web.store.productDetailsPage', ['searchCriteria' => $searchCriteria, 'vehicleDetails' => $vehicleDetails, 'vehicleImages' => $allVehicleImages]);
            }
        }
        $alert = new Alert();
        $alert->setDangerType();
        $alert->setMessage(trans('web.vehicle_no_available'));
        $alertArray->push($alert);

        return redirect()->route('storeMain')->with('alertArray', $alertArray);
    }
}
