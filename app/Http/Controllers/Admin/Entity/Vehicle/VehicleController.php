<?php

namespace App\Http\Controllers\Admin\Entity\Vehicle;


use App\Combustible;
use App\EmissionRegulation;
use App\Gearshift;
use App\Patent;
use App\Traction;
use App\Vehicle;
use App\DTO\Alert\Alert;
use App\VehicleType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VehicleController extends Controller
{
    CONST self_route = 'vehiculo';
    CONST put_method = 'PUT';
    CONST destroy_method = 'DESTROY';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicleTypeArray = Vehicle::all();

        return view('admin.entity.vehicle.index', ['itemArray' => $vehicleTypeArray, 'routeName' => self::self_route]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alertArray = collect();
        $vehicle = new Vehicle();

        //TODO: meter en un MiddleWare específico para Vehicle y que se llame en create, edit y store.
        $patents = Patent::all();
        if ($patents->isEmpty()) {
            $alert = new Alert();
            $alert->setDangerType();
            $alert->setMessage("Debes tener alguna marca registrada (Ford, BMW, etc...)");
            $alertArray->push($alert);
        } else {
            $patterns = $patents->first()->pattern;
        }

        $combustibleList = Combustible::all();
        if ($combustibleList->isEmpty()) {
            $alert = new Alert();
            $alert->setDangerType();
            $alert->setMessage("Debes tener algún tipo de combustible registrado");
            $alertArray->push($alert);
        }

        $gearshiftList = Gearshift::all();
        if ($gearshiftList->isEmpty()) {
            $alert = new Alert();
            $alert->setDangerType();
            $alert->setMessage("Debes tener algún tipo de cambio de marcha");
            $alertArray->push($alert);
        }

        $emissionRegulationList = EmissionRegulation::all();
        if ($emissionRegulationList->isEmpty()) {
            $alert = new Alert();
            $alert->setDangerType();
            $alert->setMessage("Debes tener algún tipo de normativa de emisión");
            $alertArray->push($alert);
        }

        $vehicleType = VehicleType::all();
        if ($vehicleType->isEmpty()) {
            $alert = new Alert();
            $alert->setDangerType();
            $alert->setMessage("Debes tener algún tipo de vehículo registrado (Utilitario, furgoneta, etc...)");
            $alertArray->push($alert);
        }

        $tractionList = Traction::all();
        if ($tractionList->isEmpty()) {
            $alert = new Alert();
            $alert->setDangerType();
            $alert->setMessage("Debes tener algún tipo de tracción");
            $alertArray->push($alert);
        }

        if ($alertArray->isNotEmpty()) {
            return redirect('admin/' . self::self_route)->with('alertArray', $alertArray);
        }
        return view('admin.entity.vehicle.add',
            [
                'item' => $vehicle,
                'routeName' => self::self_route,
                'formMethod' => '',
                'routeAction' => 'store',
                'patentsList' => $patents,
                'patternsList' => $patterns,
                'combustibleList' => $combustibleList,
                'gearshiftList' => $gearshiftList,
                'emissionRegulationList' => $emissionRegulationList,
                'vehicleTypeList' => $vehicleType,
                'tractionList' => $tractionList
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        //
    }
}
