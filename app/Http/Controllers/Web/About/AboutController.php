<?php

namespace App\Http\Controllers\Web\About;

use App\Patent;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function aboutMain()
    {
        $patentList = Patent::where('active', 1)->get();

        return view('web.about.aboutMainPage', ['patentList' => $patentList]);
    }
}
