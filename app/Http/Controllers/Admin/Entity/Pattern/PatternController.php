<?php

namespace App\Http\Controllers\Admin\Entity\Pattern;

use App\Http\Requests\Admin\Entity\Pattern\PatternStoreRequest;
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
     * @param PatternStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PatternStoreRequest $request)
    {
        $patentClassRequired = class_basename(Patent::class);
        $vehicleTypeClassRequired = class_basename(VehicleType::class);
        $alertArray = collect();

        $validated = $request->validated();
        $pattern = (new Pattern())->fill($validated);
        $pattern->short_name = strtoupper(str_replace(' ', '_', $pattern->name));

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
     * @param PatternStoreRequest $request
     * @param Pattern $pattern
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PatternStoreRequest $request, Pattern $pattern)
    {
        $alertArray = collect();
        $validated = $request->validated();

        $pattern->fill($validated);
        $pattern->short_name = strtoupper(str_replace(' ', '_', $pattern->name));
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
