<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class AddTourRequest extends FormRequest
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
        $addTourValidate =  [
            'name' => 'nullable',
            'num_day' => 'nullable|numeric|min:1',
            'transport_id' => 'nullable',
            'description' => 'nullable',
            'price' => 'nullable|numeric|min:1',
            'countries_id' => 'nullable',
            'image' => 'nullable'
        ];
    }

    public function validated()
    {
        return $this->validator->validated();
    }

}
