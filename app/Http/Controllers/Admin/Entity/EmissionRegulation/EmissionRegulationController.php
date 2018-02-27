<?php

namespace App\Http\Controllers\Admin\Entity\EmissionRegulation;

use App\EmissionRegulation;
use App\DTO\Alert\Alert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmissionRegulationController extends Controller
{
    CONST self_route = 'normativa-de-emision';
    CONST put_method = 'PUT';
    CONST destroy_method = 'DESTROY';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emissionRegulationArray = EmissionRegulation::all();

        return view('admin.entity.emissionRegulation.index', ['itemArray' => $emissionRegulationArray, 'routeName' => self::self_route]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $emissionRegulation = new EmissionRegulation();
        return view('admin.entity.emissionRegulation.add', ['item' => $emissionRegulation, 'routeName' => self::self_route, 'formMethod' => '', 'routeAction' => 'store']);
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
        $emissionRegulation = new EmissionRegulation();

        if (!empty($request->input('name'))) {
            $emissionRegulation->name = $request->input('name');
        } else {
            $alert = new Alert();
            $alert->setWarningType();
            $alert->setMessage("El nombre no puede estar vacío.");
            $alertArray->push($alert);
        }
        $emissionRegulation->description = $request->input('description');
        $saved = $emissionRegulation->save();

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
     * @param  \App\EmissionRegulation  $emissionRegulation
     * @return \Illuminate\Http\Response
     */
    public function show(EmissionRegulation $emissionRegulation)
    {
        $emissionRegulationArray = EmissionRegulation::all();

        return view('admin.entity.emissionRegulation.index', ['itemArray' => $emissionRegulationArray, 'routeName' => self::self_route]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmissionRegulation  $emissionRegulation
     * @return \Illuminate\Http\Response
     */
    public function edit(EmissionRegulation $emissionRegulation)
    {
        return view('admin.entity.emissionRegulation.edit', ['item' => $emissionRegulation, 'routeName' => self::self_route, 'formMethod' => self::put_method, 'routeAction' => 'update']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmissionRegulation  $emissionRegulation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmissionRegulation $emissionRegulation)
    {
        $alertArray = collect();
        if (!empty($request->input('name'))) {
            $emissionRegulation->name = $request->input('name');
        } else {
            $alert = new Alert();
            $alert->setWarningType();
            $alert->setMessage("El nombre no puede estar vacío.");
            $alertArray->push($alert);
        }
        $emissionRegulation->description = $request->input('description');
        $saved = $emissionRegulation->save();

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
     * @param  \App\EmissionRegulation  $emissionRegulation
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmissionRegulation $emissionRegulation)
    {
        $alertArray = collect();
        try {
            $deleted = $emissionRegulation->delete();
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
