<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRevenueRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
      
        return [
            'name' => "required|max:30|min:4",
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Por favor digite o nome da categoria.',
            'min' => 'O nome da categoria deve ter no minimo 3 caracteres.',
            'max' => 'O nome da categoria deve ter no máximo 30 caracteres.'
        ];
    }
}
