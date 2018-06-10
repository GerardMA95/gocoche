<?php

namespace App\Http\Controllers\Admin\Entity\Pattern;

use App\Patent;
use App\Pattern;
use App\DTO\Alert\Alert;
use App\VehicleType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PatternController extends Controller
{
    CONST self_route = 'modelo';
    CONST put_method = 'PUT';
    CONST destroy_method = 'DESTROY';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patternArray = Pattern::where('active', 1)->get();

        return view('admin.entity.pattern.index', ['itemArray' => $patternArray, 'routeName' => self::self_route]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alertArray = collect();
        $pattern = new Pattern();

        $patents = Patent::where('active', 1)->get();
        if ($patents->isEmpty()) {
            $alert = new Alert();
            $alert->setDangerType();
            $alert->setMessage("Debes tener alguna marca registrada para crear un modelo.");
            $alertArray->push($alert);
        }

        $vehicleType = VehicleType::where('active', 1)->get();
        if ($vehicleType->isEmpty()) {
            $alert = new Alert();
            $alert->setDangerType();
            $alert->setMessage("Debes tener algún tipo de vehículo registrado. (Utilitario, furgoneta, etc...)");
            $alertArray->push($alert);
        }

        if ($alertArray->isNotEmpty()) {
            return redirect('admin/' . self::self_route)->with('alertArray', $alertArray);
        }
        return view('admin.entity.pattern.add',
            [
                'item' => $pattern,
                'routeName' => self::self_route,
                'formMethod' => '',
                'routeAction' => 'store',
                'vehicleTypeList' => $vehicleType,
                'patentsList' => $patents
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $patentClassRequired = class_basename(Patent::class);
        $vehicleTypeClassRequired = class_basename(VehicleType::class);
        $alertArray = collect();
        $pattern = new Pattern();

        if (!empty($request->input('name'))) {
            $pattern->name = strtoupper($request->input('name'));
        } else {
            $alert = new Alert();
            $alert->setWarningType();
            $alert->setMessage("El nombre no puede estar vacío.");
            $alertArray->push($alert);
        }
        if (!empty($request->input($patentClassRequired))) {
            $pattern->patent_id = strtoupper($request->input($patentClassRequired));
        } else {
            $alert = new Alert();
            $alert->setWarningType();
            $alert->setMessage("El modelo necesita asociarse a una marca.");
            $alertArray->push($alert);
        }
        if (!empty($request->input($vehicleTypeClassRequired))) {
            $pattern->vehicle_type_id = strtoupper($request->input($vehicleTypeClassRequired));
        } else {
            $alert = new Alert();
            $alert->setWarningType();
            $alert->setMessage("El modelo necesita asociarse a un tipo de vehículo.");
            $alertArray->push($alert);
        }
        $pattern->places = $request->input('places');
        $pattern->doors = $request->input('doors');
        $pattern->description = $request->input('description');
        if ($alertArray->isEmpty()) {
            $saved = $pattern->save();

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

        return redirect('admin/' . self::self_route)->with('alertArray', $alertArray);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pattern $pattern
     * @return \Illuminate\Http\Response
     */
    public function show(Pattern $pattern)
    {
        $patternArray = Pattern::where('active', 1)->get();

        return view('admin.entity.pattern.index', ['itemArray' => $patternArray, 'routeName' => self::self_route]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pattern $pattern
     * @return \Illuminate\Http\Response
     */
    public function edit(Pattern $pattern)
    {
        $alertArray = collect();

        $patents = Patent::where('active', 1)->get();
        if ($patents->isEmpty()) {
            $alert = new Alert();
            $alert->setDangerType();
            $alert->setMessage("Debes tener alguna marca registrada para crear un modelo.");
            $alertArray->push($alert);
        }

        $vehicleType = VehicleType::where('active', 1)->get();
        if ($vehicleType->isEmpty()) {
            $alert = new Alert();
            $alert->setDangerType();
            $alert->setMessage("Debes tener alguna marca registrada para crear un modelo.");
            $alertArray->push($alert);
        }

        if ($alertArray->isNotEmpty()) {
            return redirect('admin/' . self::self_route)->with('alertArray', $alertArray);
        }

        return view('admin.entity.pattern.add',
            [
                'item' => $pattern,
                'routeName' => self::self_route,
                'formMethod' => self::put_method,
                'routeAction' => 'update',
                'vehicleTypeList' => $vehicleType,
                'patentsList' => $patents
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Pattern $pattern
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pattern $pattern)
    {
        $alertArray = collect();
        if (!empty($request->input('name'))) {
            $pattern->name = $request->input('name');
        } else {
            $alert = new Alert();
            $alert->setWarningType();
            $alert->setMessage("El nombre no puede estar vacío.");
            $alertArray->push($alert);
        }
        $pattern->description = $request->input('description');
        $saved = $pattern->save();

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

        return redirect()->back()->with('alertArray', $alertArray);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pattern $pattern
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pattern $pattern)
    {
        $alertArray = collect();
        try {
            $pattern->active = false;
            $updated = $pattern->save();
            if ($updated) {
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

    public function ajaxReloadPatternList(Request $request)
    {
        $response = [
            'status' => false,
            'message' => 'Faltan parámetros.',
            'patternList' => []
        ];

        if($request->has('patentId')) {
            $patentId = $request->get('patentId');
            $patternList = Pattern::where('patent_id', $patentId)->where('active', true)->get();
            $response['patternList'] = $patternList;
        }

        return response()->json($response);
    }
}
