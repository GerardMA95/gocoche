<?php

namespace App\Http\Controllers\Web\Contact;

use App\Http\Controllers\Controller;
use App\Services\Utils\Search\BuildSearchCriteria;

class ContactController extends Controller
{
    public function contactMain()
    {
        $builderSearchCriteria = new BuildSearchCriteria();
        $searchCriteria = $builderSearchCriteria->buildDefault();

        return view('web.contact.contactPage', ['searchCriteria' => $searchCriteria]);
    }
}
