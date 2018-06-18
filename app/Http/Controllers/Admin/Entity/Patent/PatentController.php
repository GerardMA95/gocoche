<?php

namespace App\Http\Controllers\Admin\Entity\Patent;

use App\Http\Requests\Admin\Entity\Patent\PatentStoreRequest;
use App\Patent;
use App\DTO\Alert\Alert;
use App\Services\Files\FilesLocalServer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PatentController extends Controller
{
    CONST self_route = 'marca';
    CONST put_method = 'PUT';
    CONST destroy_method = 'DESTROY';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patentArray = Patent::where('active', 1)->get();

        return view('admin.entity.patent.index', ['itemArray' => $patentArray, 'routeName' => self::self_route]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patent = new Patent();
        return view('admin.entity.patent.add', ['item' => $patent, 'routeName' => self::self_route, 'formMethod' => '', 'routeAction' => 'store']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PatentStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatentStoreRequest $request)
    {
        $alertArray = collect();

        $validated = $request->validated();
        $patent = (new Patent())->fill($validated);
        $patent->short_name = strtoupper(str_replace(' ', '_', $patent->name));
        $saved = $patent->save();

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
            $arrayImagesUrl = $fileLocalServer->uploadFilesWithEntityParams($request, $patent);
            $patent->image_url = str_replace("public/", "storage/", $arrayImagesUrl->first());
            $patent->save();
        }

        return redirect('admin/' . self::self_route)->with('alertArray', $alertArray);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patent $patent
     * @return \Illuminate\Http\Response
     */
    public function show(Patent $patent)
    {
        $patentArray = Patent::where('active', 1)->get();

        return view('admin.entity.patent.index', ['itemArray' => $patentArray, 'routeName' => self::self_route]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patent $patent
     * @return \Illuminate\Http\Response
     */
    public function edit(Patent $patent)
    {
        return view('admin.entity.patent.edit', ['item' => $patent, 'routeName' => self::self_route, 'formMethod' => self::put_method, 'routeAction' => 'update']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Patent $patent
     * @return \Illuminate\Http\Response
     */
    public function update(PatentStoreRequest $request, Patent $patent)
    {
        $alertArray = collect();
        $validated = $request->validated();
        $patent->fill($validated);
        $patent->short_name = strtoupper(str_replace(' ', '_', $patent->name));
        $saved = $patent->save();

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

        if ($request->hasFile('entity-images')) {
            $fileLocalServer = new FilesLocalServer();
            $fileLocalServer->removeAllFilesFromEntity($patent);
            $arrayImagesUrl = $fileLocalServer->uploadFilesWithEntityParams($request, $patent);
            $patent->image_url = str_replace("public/", "storage/", $arrayImagesUrl->first());
            $patent->save();
        }

        return redirect()->back()->with('alertArray', $alertArray);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patent $patent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patent $patent)
    {
        $alertArray = collect();
        try {
            $patent->active = false;
            $updated = $patent->save();
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
