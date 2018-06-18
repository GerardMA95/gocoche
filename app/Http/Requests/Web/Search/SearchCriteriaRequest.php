<?php

namespace App\Http\Requests\Web\Search;

use Illuminate\Foundation\Http\FormRequest;

class SearchCriteriaRequest extends FormRequest
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
            'price-min' => 'required|numeric',
            'price-max' => 'required|numeric',
            'power-min' => 'required|numeric',
            'power-max' => 'required|numeric',
            'patent' => 'required|array',
//            'pattern' => 'required|array',
            'color' => 'required|array',
        ];
        //Por cada marca, añadimos las reglas.
        $patentList = count($this->input('patent'));
        foreach(range(0, $patentList) as $index) {
            $rules['patent.' . $index] = 'numeric';
        }
        //Por cada marca, añadimos las reglas.
        $colorList = count($this->input('color'));
        foreach(range(0, $colorList) as $index) {
            $rules['color.' . $index] = 'numeric';
        }

        return $rules;
    }
}
