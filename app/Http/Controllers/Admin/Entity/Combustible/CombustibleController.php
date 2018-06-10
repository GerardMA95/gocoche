<?php

namespace App\Http\Controllers\Admin\Entity\Combustible;

use App\Combustible;
use App\DTO\Alert\Alert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CombustibleController extends Controller
{
    CONST self_route = 'combustible';
    CONST put_method = 'PUT';
    CONST destroy_method = 'DESTROY';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $combustibleArray = Combustible::where('active', 1)->get();

        return view('admin.entity.combustible.index', ['itemArray' => $combustibleArray, 'routeName' => self::self_route]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $combustible = new Combustible();
        return view('admin.entity.combustible.add', ['item' => $combustible, 'routeName' => self::self_route, 'formMethod' => '', 'routeAction' => 'store']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alertArray = collect();
        $combustible = new Combustible();

        if (!empty($request->input('name'))) {
            $combustible->name = $request->input('name');
        } else {
            $alert = new Alert();
            $alert->setWarningType();
            $alert->setMessage("El nombre no puede estar vacío.");
            $alertArray->push($alert);
        }
        $combustible->description = $request->input('description');
        $saved = $combustible->save();

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
     * @param  \App\Combustible $combustible
     * @return \Illuminate\Http\Response
     */
    public function show(Combustible $combustible)
    {
        $combustibleArray = Combustible::where('active', 1)->get();

        return view('admin.entity.combustible.index', ['itemArray' => $combustibleArray, 'routeName' => self::self_route]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Combustible $combustible
     * @return \Illuminate\Http\Response
     */
    public function edit(Combustible $combustible)
    {
        return view('admin.entity.combustible.edit', ['item' => $combustible, 'routeName' => self::self_route, 'formMethod' => self::put_method, 'routeAction' => 'update']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Combustible $combustible
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Combustible $combustible)
    {
        $alertArray = collect();
        if (!empty($request->input('name'))) {
            $combustible->name = $request->input('name');
        } else {
            $alert = new Alert();
            $alert->setWarningType();
            $alert->setMessage("El nombre no puede estar vacío.");
            $alertArray->push($alert);
        }
        $combustible->description = $request->input('description');
        $saved = $combustible->save();

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
     * @param Combustible $combustible
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function destroy(Combustible $combustible)
    {
        $alertArray = collect();
        try {
            $combustible->active = false;
            $updated = $combustible->save();
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
}
