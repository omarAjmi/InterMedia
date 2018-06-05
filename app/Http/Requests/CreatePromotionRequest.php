<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePromotionRequest extends FormRequest
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
            'description' => 'required|max:255|string',
            'category' => 'required|max:255|string',
            'image' => 'required|file|mimes : jpeg, bmp, png '
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
            'description.required' => 'description est requis',
            'category.required' => 'catégory est requis',
            'image.required' => 'image est requis',
            'image.mimes' => 'photo doit être de type: jpeg, bmp, png',
        ];
    }
}
