<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateClientPublicRequest extends FormRequest
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
            'first_name' => 'required|max:255|string',
            'last_name' => 'required|max:255|string',
            'email' => 'required|max:255|unique:users,email|email',
            'image' => 'file|mimes : jpeg, bmp, png ',
            'address' => 'required|max:255|string',
            'phone' => 'required|max:8|min:8|string',
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
            'phone' => 'téléphone depasse pas 8 chiffres',
            'image.mimes' => 'photo doit être de type: jpeg, bmp, png',
        ];
    }
}
