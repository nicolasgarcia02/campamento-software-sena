<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreCourseRequest extends FormRequest
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
            "title" => "required|max:50",
            "description" => "required|min:10",
            "weeks" => "required",
        ];
    }

    public function messages()
    {
        return [
            "title.required" => 'titulo obligatorio',
            "title.max" => 'caracteres maximos: 50',
            "description" => 'caracteres minimos 10'
        ];
    }


    // Enviar response con errores de validacion
    protected function failedValidation(Validator $v){
        // Si la validacion es fallida se lanza una exepcion Http
        throw new HttpResponseException(
            response()->json([
                        "success" => false,
                        "erros" => $v->errors()
            ] , 422)
            );
    }
}
