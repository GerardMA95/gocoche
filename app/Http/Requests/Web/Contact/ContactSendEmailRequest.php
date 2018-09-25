<?php

namespace App\Http\Requests\Web\Contact;

use Illuminate\Foundation\Http\FormRequest;

class ContactSendEmailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required',
            'message' => 'required',
            'email_from' => 'required|email',
            'subject' => 'required',
            'phone' => 'nullable|numeric'
        ];

        return $rules;
    }
}
