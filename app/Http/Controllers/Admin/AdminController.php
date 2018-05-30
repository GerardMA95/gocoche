<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Show de main view of the admin
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function admin()
    {
        return view('admin.main.main');
    }

    /**
     * Show de main view of the "Coches" section
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adminVehicle()
    {
        return view('admin.main.carMain');
    }
}
