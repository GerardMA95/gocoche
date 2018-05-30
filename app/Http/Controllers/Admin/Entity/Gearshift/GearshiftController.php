<?php

namespace App\Http\Controllers\Admin\Entity\Gearshift;

use App\Gearshift;
use App\DTO\Alert\Alert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GearshiftController extends Controller
{
    CONST self_route = 'cambio-de-marcha';
    CONST put_method = 'PUT';
    CONST destroy_method = 'DESTROY';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gearshiftArray = Gearshift::where('active', 1)->get();;

        return view('admin.entity.gearshift.index', ['itemArray' => $gearshiftArray, 'routeName' => self::self_route]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gearshift = new Gearshift();
        return view('admin.entity.gearshift.add', ['item' => $gearshift, 'routeName' => self::self_route, 'formMethod' => '', 'routeAction' => 'store']);
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
        $gearshift = new Gearshift();

        if (!empty($request->input('name'))) {
            $gearshift->name = $request->input('name');
        } else {
            $alert = new Alert();
            $alert->setWarningType();
            $alert->setMessage("El nombre no puede estar vacío.");
            $alertArray->push($alert);
        }
        $gearshift->description = $request->input('description');
        $saved = $gearshift->save();

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
     * @param  \App\Gearshift  $gearshift
     * @return \Illuminate\Http\Response
     */
    public function show(Gearshift $gearshift)
    {
        $gearshiftArray = Gearshift::where('active', 1)->get();;

        return view('admin.entity.gearshift.index', ['itemArray' => $gearshiftArray, 'routeName' => self::self_route]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gearshift  $gearshift
     * @return \Illuminate\Http\Response
     */
    public function edit(Gearshift $gearshift)
    {
        return view('admin.entity.gearshift.edit', ['item' => $gearshift, 'routeName' => self::self_route, 'formMethod' => self::put_method, 'routeAction' => 'update']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gearshift  $gearshift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gearshift $gearshift)
    {
        $alertArray = collect();
        if (!empty($request->input('name'))) {
            $gearshift->name = $request->input('name');
        } else {
            $alert = new Alert();
            $alert->setWarningType();
            $alert->setMessage("El nombre no puede estar vacío.");
            $alertArray->push($alert);
        }
        $gearshift->description = $request->input('description');
        $saved = $gearshift->save();

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
     * @param  \App\Gearshift  $gearshift
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gearshift $gearshift)
    {
        $alertArray = collect();
        try {
            $deleted = $gearshift->delete();
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
