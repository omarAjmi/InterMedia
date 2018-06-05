<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class CreateTechnicianRequest extends FormRequest
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
            'first_name' => 'required|max:255|string',
            'last_name' => 'required|max:255|string',
            'image' => 'file|mimes : jpeg, bmp, png ',
            'email' => 'required|max:255|unique|email',
            'address' => 'required|max:255|string',
            'phone' => 'required|max:8|string',
            'cin' => 'required|max:8|min:8|string',
            'post' => 'required|max:255|string',
            'bio' => 'required|max:255|string',
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
            'first_name.required' => 'prénom est requis',
            'last_name.required' => 'nom est requis',
            'email.required' => 'email est requis',
            'email.unique' => 'email est déjà utilisé',
            'email.email' => 'email doit être de la forme \'exemple@example.com\'',
            'address.required' => 'adresse est requis',
            'phone.required' => 'téléphone est requis',
            'phone.max' => 'téléphone depasse pas 8 chiffres',
            'cin.required' => 'cin est requis, depasse pas 8 chiffres',
            'cin' => 'cin depasse pas 8 chiffres',
            'post.required' => 'poste est requis',
            'bio.required' => 'biographie est requis',
            'image.mimes' => 'photo doit être de type: jpeg, bmp, png',
        ];
    }
}
