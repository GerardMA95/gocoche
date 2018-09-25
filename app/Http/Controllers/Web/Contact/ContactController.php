<?php

namespace App\Http\Controllers\Web\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Contact\ContactSendEmailRequest;
use App\Services\Utils\Search\BuildSearchCriteria;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    const EMAIL_INFO_DEFAULT = 'info@qualityluxecars.com';

    public function contactMain()
    {
        $builderSearchCriteria = new BuildSearchCriteria();
        $searchCriteria = $builderSearchCriteria->buildDefault();

        return view('web.contact.contactPage', ['searchCriteria' => $searchCriteria]);
    }

    public function contactSendEmail(ContactSendEmailRequest $request)
    {
        $builderSearchCriteria = new BuildSearchCriteria();
        $searchCriteria = $builderSearchCriteria->buildDefault();
        $validated = $request->validated();

        if ($validated) {
            $emailFrom = $validated['email_from'];
            $subject = $validated['subject'];

            //Envía el mensaje en texto plano.
            Mail::raw('Correo de contacto: '.$emailFrom.'</br> Mensaje: '.$validated['message'], function ($message) use ($emailFrom, $subject) {
                $message->from(self::EMAIL_INFO_DEFAULT, 'Quality Luxe Cars Contacto web');
                $message->to(self::EMAIL_INFO_DEFAULT)->subject($subject);
            });
        }

        return view('web.contact.contactPage', ['searchCriteria' => $searchCriteria]);
    }
}
