<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderPublicRequest extends FormRequest
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
        return [
            'breakdown' => 'required|max:255|string',
            'brand' => 'required|max:255|string',
            'model' => 'required|max:255|string',
            'color' => 'required|string|max:7|min:7',
            'accessories' => 'max:255|string',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'breakdown.required' => 'panne est requis',
            'brand.required' => 'marque est requis',
            'model.required' => 'model est requis',
            'color.required' => 'couleur est requis',
        ];
    }
}
