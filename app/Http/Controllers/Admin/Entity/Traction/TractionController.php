<?php

namespace App\Http\Controllers\Admin\Entity\Traction;

use App\Traction;
use App\DTO\Alert\Alert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class TractionController extends Controller
{
    CONST self_route = 'traccion';
    CONST put_method = 'PUT';
    CONST destroy_method = 'DESTROY';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tractionArray = Traction::all();

        return view('admin.entity.traction.index', ['itemArray' => $tractionArray, 'routeName' => self::self_route]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $traction = new Traction();
        return view('admin.entity.traction.add', ['item' => $traction, 'routeName' => self::self_route, 'formMethod' => '', 'routeAction' => 'store']);
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
        $traction = new Traction();

        if (!empty($request->input('name'))) {
            $traction->name = $request->input('name');
        } else {
            $alert = new Alert();
            $alert->setWarningType();
            $alert->setMessage("El nombre no puede estar vacío.");
            $alertArray->push($alert);
        }
        $traction->description = $request->input('description');
        $saved = $traction->save();

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
     * @param  \App\Traction  $traction
     * @return \Illuminate\Http\Response
     */
    public function show(Traction $traction)
    {
        $tractionArray = Traction::all();

        return view('admin.entity.traction.index', ['itemArray' => $tractionArray, 'routeName' => self::self_route]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Traction  $traction
     * @return \Illuminate\Http\Response
     */
    public function edit(Traction $traction)
    {
        return view('admin.entity.traction.edit', ['item' => $traction, 'routeName' => self::self_route, 'formMethod' => self::put_method, 'routeAction' => 'update']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Traction  $traction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Traction $traction)
    {
        $alertArray = collect();
        if (!empty($request->input('name'))) {
            $traction->name = $request->input('name');
        } else {
            $alert = new Alert();
            $alert->setWarningType();
            $alert->setMessage("El nombre no puede estar vacío.");
            $alertArray->push($alert);
        }
        $traction->description = $request->input('description');
        $saved = $traction->save();

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
     * @param  \App\Traction  $traction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Traction $traction)
    {
        $alertArray = collect();
        try {
            $deleted = $traction->delete();
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
