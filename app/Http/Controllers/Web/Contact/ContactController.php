<?php

namespace App\Http\Controllers\Web\Contact;

use App\Patent;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function contactMain()
    {
        $patentList = Patent::where('active', 1)->get();

        return view('web.contact.contactPage', ['patentList' => $patentList]);
    }
}
