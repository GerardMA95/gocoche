<?php

namespace App\Http\Controllers\Admin\Entity\Vehicle;


use App\Color;
use App\Combustible;
use App\EmissionRegulation;
use App\Gearshift;
use App\Http\Requests\Admin\Entity\Vehicle\VehicleStoreRequest;
use App\Patent;
use App\Pattern;
use App\Services\Files\FilesLocalServer;
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
        $vehicleArray = Vehicle::orderBy('created_at', 'desc')->get();

        return view('admin.entity.vehicle.index', ['itemArray' => $vehicleArray, 'routeName' => self::self_route]);
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
        $patents = Patent::where('active', 1)->get();
        if ($patents->isEmpty()) {
            $alert = new Alert();
            $alert->setDangerType();
            $alert->setMessage("Debes tener alguna marca registrada (Ford, BMW, etc...)");
            $alertArray->push($alert);
        } else {
            $patterns = $patents->first()->pattern;
        }

        $combustibleList = Combustible::where('active', 1)->get();
        if ($combustibleList->isEmpty()) {
            $alert = new Alert();
            $alert->setDangerType();
            $alert->setMessage("Debes tener algún tipo de combustible registrado");
            $alertArray->push($alert);
        }

        $gearshiftList = Gearshift::where('active', 1)->get();
        if ($gearshiftList->isEmpty()) {
            $alert = new Alert();
            $alert->setDangerType();
            $alert->setMessage("Debes tener algún tipo de cambio de marcha");
            $alertArray->push($alert);
        }

        $emissionRegulationList = EmissionRegulation::where('active', 1)->get();
        if ($emissionRegulationList->isEmpty()) {
            $alert = new Alert();
            $alert->setDangerType();
            $alert->setMessage("Debes tener algún tipo de normativa de emisión");
            $alertArray->push($alert);
        }

        $tractionList = Traction::where('active', 1)->get();
        if ($tractionList->isEmpty()) {
            $alert = new Alert();
            $alert->setDangerType();
            $alert->setMessage("Debes tener algún tipo de tracción");
            $alertArray->push($alert);
        }

        $colorsList = Color::where('active', 1)->get();
        if ($colorsList->isEmpty()) {
            $alert = new Alert();
            $alert->setDangerType();
            $alert->setMessage("Necesitas algún color para el vehículo.");
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
                'tractionList' => $tractionList,
                'colorsList' => $colorsList,
                'itemImagesList' => collect()
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  VehicleStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehicleStoreRequest $request)
    {
        $validated = $request->validated();
        $alertArray = collect();
        $patentClassRequired = class_basename(Patent::class);
        $patternClassRequired = class_basename(Pattern::class);
        $emissionRegulationClassRequired = class_basename(EmissionRegulation::class);
        $tractionClassRequired = class_basename(Traction::class);
        $combustibleClassRequired = class_basename(Combustible::class);
        $gearshiftClassRequired = class_basename(Gearshift::class);
        $colorClassRequired = class_basename(Color::class);

        $vehicle = (new Vehicle())->fill($validated);
        $vehicle->calculateMargin();
        $vehicle->calculateProfit();
        $vehicle->short_name = strtoupper(str_replace(' ', '_', $vehicle->name));

        //TODO Mejorar la validación de la fecha.
        if ($validated['enrollment_date']) {
            $validated['enrollment_date'] = str_replace('/', '-', $validated['enrollment_date']);
            $registrationDate = \DateTime::createFromFormat('Y-m-d', date('Y-m-d', strtotime($validated['enrollment_date'])));
            if ($registrationDate) {
                $vehicle->enrollment_date = $registrationDate;
            } else {
                $alert = new Alert();
                $alert->setWarningType();
                $alert->setMessage("Se ha introducido una fecha de matriculación incorrecta.");
                $alertArray->push($alert);
            }
        }

        if (!empty($request->input($patentClassRequired))) {
            $vehicle->patent_id = strtoupper($request->input($patentClassRequired));
        } else {
            $alert = new Alert();
            $alert->setWarningType();
            $alert->setMessage("El vehículo necesita asociarse a una marca.");
            $alertArray->push($alert);
        }

        if (!empty($request->input($patternClassRequired))) {
            $vehicle->pattern_id = strtoupper($request->input($patternClassRequired));
        } else {
            $alert = new Alert();
            $alert->setWarningType();
            $alert->setMessage("El vehículo necesita asociarse a un modelo.");
            $alertArray->push($alert);
        }

        if (!empty($request->input($emissionRegulationClassRequired))) {
            $vehicle->emission_regulation_id = strtoupper($request->input($emissionRegulationClassRequired));
        } else {
            $alert = new Alert();
            $alert->setWarningType();
            $alert->setMessage("El vehículo necesita asociarse a una normativa de emisión.");
            $alertArray->push($alert);
        }

        if (!empty($request->input($tractionClassRequired))) {
            $vehicle->traction_id = strtoupper($request->input($tractionClassRequired));
        } else {
            $alert = new Alert();
            $alert->setWarningType();
            $alert->setMessage("El vehículo necesita asociarse un tipo de tracción.");
            $alertArray->push($alert);
        }

        if (!empty($request->input($combustibleClassRequired))) {
            $vehicle->combustible_id = strtoupper($request->input($combustibleClassRequired));
        } else {
            $alert = new Alert();
            $alert->setWarningType();
            $alert->setMessage("El vehículo necesita asociarse a un tipo de combustible.");
            $alertArray->push($alert);
        }

        if (!empty($request->input($gearshiftClassRequired))) {
            $vehicle->gearshift_id = strtoupper($request->input($gearshiftClassRequired));
        } else {
            $alert = new Alert();
            $alert->setWarningType();
            $alert->setMessage("El vehículo necesita asociarse a un tipo de cambio de marcha.");
            $alertArray->push($alert);
        }

        if (!empty($request->input($colorClassRequired))) {
            $vehicle->color_id = strtoupper($request->input($colorClassRequired));
        } else {
            $alert = new Alert();
            $alert->setWarningType();
            $alert->setMessage("El vehículo necesita un color.");
            $alertArray->push($alert);
        }

        if ($alertArray->isEmpty()) {
            $saved = $vehicle->save();
            if ($saved) {
                $alert = new Alert();
                $alert->setSuccessType();
                $alert->setMessage(trans('form.save_success'));
                $alertArray->push($alert);
            } else {
                $alert = new Alert();
                $alert->setDangerType();
                $alert->setMessage(trans('form.save_danger'));
                $alertArray->push($alert);
            }
        }
        //Si se han pasado imagenes para subir.
        if ($request->hasFile('entity-images')) {
            $fileLocalServer = new FilesLocalServer();
            $arrayImagesUrl = $fileLocalServer->uploadFilesWithEntityParams($request, $vehicle);
        }

        return redirect('admin/' . self::self_route)->with('alertArray', $alertArray);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vehicle $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehicle $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        $alertArray = collect();

        $fileLocalServer = new FilesLocalServer();
        $allVehicleImages = $fileLocalServer->getAllFilesFromEntity($vehicle);

        //TODO: meter en un MiddleWare específico para Vehicle y que se llame en create, edit y store.
        $patents = Patent::where('active', 1)->get();
        if ($patents->isEmpty()) {
            $alert = new Alert();
            $alert->setDangerType();
            $alert->setMessage("Debes tener alguna marca registrada (Ford, BMW, etc...)");
            $alertArray->push($alert);
        } else {
            $patterns = $vehicle->patent->pattern;
        }

        $combustibleList = Combustible::where('active', 1)->get();
        if ($combustibleList->isEmpty()) {
            $alert = new Alert();
            $alert->setDangerType();
            $alert->setMessage("Debes tener algún tipo de combustible registrado");
            $alertArray->push($alert);
        }

        $gearshiftList = Gearshift::where('active', 1)->get();
        if ($gearshiftList->isEmpty()) {
            $alert = new Alert();
            $alert->setDangerType();
            $alert->setMessage("Debes tener algún tipo de cambio de marcha");
            $alertArray->push($alert);
        }

        $emissionRegulationList = EmissionRegulation::where('active', 1)->get();
        if ($emissionRegulationList->isEmpty()) {
            $alert = new Alert();
            $alert->setDangerType();
            $alert->setMessage("Debes tener algún tipo de normativa de emisión");
            $alertArray->push($alert);
        }

        $tractionList = Traction::where('active', 1)->get();
        if ($tractionList->isEmpty()) {
            $alert = new Alert();
            $alert->setDangerType();
            $alert->setMessage("Debes tener algún tipo de tracción");
            $alertArray->push($alert);
        }

        $colorsList = Color::where('active', 1)->get();
        if ($colorsList->isEmpty()) {
            $alert = new Alert();
            $alert->setDangerType();
            $alert->setMessage("No hay ningún color disponible.");
            $alertArray->push($alert);
        }

        if ($alertArray->isNotEmpty()) {
            return redirect('admin/' . self::self_route)->with('alertArray', $alertArray);
        }

        return view('admin.entity.vehicle.edit',
            [
                'item' => $vehicle,
                'routeName' => self::self_route,
                'formMethod' => self::put_method,
                'routeAction' => 'update',
                'patentsList' => $patents,
                'patternsList' => $patterns,
                'combustibleList' => $combustibleList,
                'gearshiftList' => $gearshiftList,
                'emissionRegulationList' => $emissionRegulationList,
                'tractionList' => $tractionList,
                'colorsList' => $colorsList,
                'itemImagesList' => $allVehicleImages
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  VehicleStoreRequest $request
     * @param  \App\Vehicle $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(VehicleStoreRequest $request, Vehicle $vehicle)
    {
        $alertArray = collect();

        $validated = $request->validated();

        $patentClassRequired = class_basename(Patent::class);
        $patternClassRequired = class_basename(Pattern::class);
        $emissionRegulationClassRequired = class_basename(EmissionRegulation::class);
        $tractionClassRequired = class_basename(Traction::class);
        $combustibleClassRequired = class_basename(Combustible::class);
        $gearshiftClassRequired = class_basename(Gearshift::class);
        $colorClassRequired = class_basename(Color::class);

        $vehicle = ($vehicle)->fill($validated);
        $vehicle->calculateMargin();
        $vehicle->calculateProfit();
        $vehicle->patent_id = $request->input($patentClassRequired);
        $vehicle->pattern_id = $request->input($patternClassRequired);
        $vehicle->emission_regulation_id = $request->input($emissionRegulationClassRequired);
        $vehicle->traction_id = $request->input($tractionClassRequired);
        $vehicle->combustible_id = $request->input($combustibleClassRequired);
        $vehicle->gearshift_id = $request->input($gearshiftClassRequired);
        $vehicle->color_id = $request->input($colorClassRequired);
        $vehicle->short_name = strtoupper(str_replace(' ', '_', $vehicle->name));

        if($validated['enrollment_date']) {
            $validated['enrollment_date'] = str_replace('/', '-', $validated['enrollment_date']);
            $registrationDate = \DateTime::createFromFormat('Y-m-d', date('Y-m-d', strtotime($validated['enrollment_date'])));
            if ($registrationDate) {
                $vehicle->enrollment_date = $registrationDate;
            } else {
                $alert = new Alert();
                $alert->setWarningType();
                $alert->setMessage("Se ha introducido una fecha de matriculación incorrecta.");
                $alertArray->push($alert);
            }
        }

        $saved = $vehicle->save();
        if ($saved) {
            $alert = new Alert();
            $alert->setSuccessType();
            $alert->setMessage(trans('form.save_success'));
            $alertArray->push($alert);
        } else {
            $alert = new Alert();
            $alert->setDangerType();
            $alert->setMessage(trans('form.save_danger'));
            $alertArray->push($alert);
        }
        //Si se han pasado imagenes para subir.
        if ($request->hasFile('entity-images')) {
            $fileLocalServer = new FilesLocalServer();
            $fileLocalServer->removeAllFilesFromEntity($vehicle);
            $arrayImagesUrl = $fileLocalServer->uploadFilesWithEntityParams($request, $vehicle);
        }

        return redirect()->back()->with('alertArray', $alertArray);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehicle $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        $alertArray = collect();
        try {
            $deleted = $vehicle->delete();
            if ($deleted) {
                $fileLocalServer = new FilesLocalServer();
                $fileLocalServer->removeAllFilesFromEntity($vehicle);

                $alert = new Alert();
                $alert->setSuccessType();
                $alert->setMessage(trans('form.delete_success'));
                $alertArray->push($alert);
            } else {
                $alert = new Alert();
                $alert->setDangerType();
                $alert->setMessage(trans('form.delete_danger'));
                $alertArray->push($alert);
            }
        } catch (\Exception $exception) {
            $alert = new Alert();
            $alert->setDangerType();
            $alert->setMessage(trans('form.error_help_email'));
            $alertArray->push($alert);
        }

        return redirect()->back()->with('alertArray', $alertArray);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function active()
    {
        $vehicleArray = Vehicle::where('active', true)->orderBy('created_at', 'desc')->get();

        return view('admin.entity.vehicle.index', ['itemArray' => $vehicleArray, 'routeName' => self::self_route, 'visible' => true]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function disabled()
    {
        $vehicleArray = Vehicle::where('active', false)->orderBy('created_at', 'desc')->get();
        /* 'visible' variable de control para la vista */
        return view('admin.entity.vehicle.index', ['itemArray' => $vehicleArray, 'routeName' => self::self_route, 'visible' => false]);
    }
    /******
     *
     * Ajax calls
     *
     ******/

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajaxUpdateActive(Request $request)
    {
        $response = [
            'status' => false,
            'message' => 'Faltan parámetros.',
        ];

        if($request->has('vehicleId') && $request->has('active')) {
            try{
                $vehicle = Vehicle::findOrFail(intval($request->get('vehicleId')));
                $vehicle->active = boolval($request->get('active'));
                $vehicle->save();

                $response['status'] = true;
                $response['message'] = 'Vehículo actualizado';
            } catch (\Throwable $throwable) {
                $response['message'] = $throwable->getMessage();
            }
        }

        return response()->json($response);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajaxUpdateHighlight(Request $request)
    {
        $response = [
            'status' => false,
            'message' => 'Faltan parámetros.',
        ];

        if($request->has('vehicleId') && $request->has('highlight')) {
            try{
                $vehicle = Vehicle::findOrFail(intval($request->get('vehicleId')));
                $vehicle->highlighted = boolval($request->get('highlight'));
                $vehicle->save();

                $response['status'] = true;
                $response['message'] = 'Vehículo actualizado';
            } catch (\Throwable $throwable) {
                $response['message'] = $throwable->getMessage();
            }
        }

        return response()->json($response);
    }
}
