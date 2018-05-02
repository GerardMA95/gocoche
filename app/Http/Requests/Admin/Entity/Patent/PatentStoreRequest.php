<?php

namespace App\Http\Requests\Admin\Entity\Patent;

use Illuminate\Foundation\Http\FormRequest;

class PatentStoreRequest extends FormRequest
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
            'description' => 'required'
        ];
        //Por cada imagen, añadimos las reglas.
        $images = count($this->input('entity-images'));
        foreach(range(0, $images) as $index) {
            $rules['entity-images.' . $index] = 'image|mimes:jpeg,png,jpg|max:5000';
        }

        return $rules;
    }
}
