<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (!is_null(Auth::User()->technician) and Auth::user()->technician->admin) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'client' => 'required|integer',
            'breakdown' => 'required|max:255|string',
            'brand' => 'required|max:255|string',
            'model' => 'required|max:255|string',
            'tech' => 'required|integer',
            'color' => 'required|string|max:7|min:7',
            'accessories' => 'required||max:255|string',
            'nature' => 'required',
            'return_date' => 'required|after_or_equal:' . now()->toDateTimeString(),
            'cost' => 'required',
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
            'client.required' => 'client est requis',
            'breakdown.required' => 'panne est requis',
            'brand.required' => 'marque est requis',
            'model.required' => 'model est requis',
            'tech.required' => 'technicien est requis',
            'color.required' => 'couleur est requis',
            'nature.required' => 'nature est requis',
            'return_date.required' => 'date de retour est requis',
            'return_date.after_or_equal:' => 'date de retour doit être égale ou aprés aujourd\'hui',
            'cost.required' => 'montant est requis',
        ];
    }
}
