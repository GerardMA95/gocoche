<?php

namespace App\Http\Controllers\Web\About;

use App\Http\Controllers\Controller;
use App\Services\Utils\Search\BuildSearchCriteria;

class AboutController extends Controller
{
    public function aboutMain()
    {
        $builderSearchCriteria = new BuildSearchCriteria();
        $searchCriteria = $builderSearchCriteria->buildDefault();

        return view('web.about.aboutMainPage', ['searchCriteria' => $searchCriteria]);
    }
}
