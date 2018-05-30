<?php

namespace App\Http\Controllers\Admin\Entity\VehicleType;

use App\VehicleType;
use App\DTO\Alert\Alert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VehicleTypeController extends Controller
{
    CONST self_route = 'tipo-de-vehiculo';
    CONST put_method = 'PUT';
    CONST destroy_method = 'DESTROY';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicleTypeArray = VehicleType::where('active', 1)->get();

        return view('admin.entity.vehicleType.index', ['itemArray' => $vehicleTypeArray, 'routeName' => self::self_route]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicleType = new VehicleType();
        return view('admin.entity.vehicleType.add', ['item' => $vehicleType, 'routeName' => self::self_route, 'formMethod' => '', 'routeAction' => 'store']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alertArray = collect();
        $vehicleType = new VehicleType();

        if (!empty($request->input('name'))) {
            $vehicleType->name = $request->input('name');
        } else {
            $alert = new Alert();
            $alert->setWarningType();
            $alert->setMessage("El nombre no puede estar vacío.");
            $alertArray->push($alert);
        }
        $vehicleType->description = $request->input('description');
        $saved = $vehicleType->save();

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

        return redirect('admin/'.self::self_route)->with('alertArray', $alertArray);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VehicleType  $vehicleType
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleType $vehicleType)
    {
        $vehicleTypeArray = VehicleType::where('active', 1)->get();

        return view('admin.entity.vehicleType.index', ['itemArray' => $vehicleTypeArray, 'routeName' => self::self_route]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VehicleType  $vehicleType
     * @return \Illuminate\Http\Response
     */
    public function edit(VehicleType $vehicleType)
    {
        return view('admin.entity.vehicleType.edit', ['item' => $vehicleType, 'routeName' => self::self_route, 'formMethod' => self::put_method, 'routeAction' => 'update']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VehicleType  $vehicleType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VehicleType $vehicleType)
    {
        $alertArray = collect();
        if (!empty($request->input('name'))) {
            $vehicleType->name = $request->input('name');
        } else {
            $alert = new Alert();
            $alert->setWarningType();
            $alert->setMessage("El nombre no puede estar vacío.");
            $alertArray->push($alert);
        }
        $vehicleType->description = $request->input('description');
        $saved = $vehicleType->save();

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
     * @param  \App\VehicleType  $vehicleType
     * @return \Illuminate\Http\Response
     */
    public function destroy(VehicleType $vehicleType)
    {
        $alertArray = collect();
        try {
            $deleted = $vehicleType->delete();
            if ($deleted) {
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
}
