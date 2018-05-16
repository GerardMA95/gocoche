<?php

namespace App\Http\Requests\Admin\Entity\Vehicle;

use Illuminate\Foundation\Http\FormRequest;

class VehicleStoreRequest extends FormRequest
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
            'short_description' => 'required',
            'description' => 'required',
            'color' => 'required',
            'km' => 'required|numeric',
            'enrollment' => 'required',
            'enrollment_date' => 'required',
            'price' => 'required|numeric',
            'price_bought' => 'required|numeric',
            'power' => 'required|numeric'
        ];
        //Por cada imagen, añadimos las reglas.
        $images = count($this->input('entity-images'));
        foreach(range(0, $images) as $index) {
            $rules['entity-images.' . $index] = 'image|mimes:jpeg,png,jpg|max:5000';
        }

        return $rules;
    }
}
