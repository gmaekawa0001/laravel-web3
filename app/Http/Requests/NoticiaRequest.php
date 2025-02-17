<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticiaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => 'required',
            'data' => 'required',
            'autor' => 'required',
            'categoria_id' => 'required|exists:categoria,id'
            //
        ];
    }

    public function messages(): array
    {
        return [
            'titulo.required' => 'O título é obrigatório',
            'data.required' => 'A data é obrigatória',
            'autor.required' => 'O autor é obrigatório',
            'categoria_id.required' => 'A categoria é obrigatória',
            'categoria_id.exists' => 'Categoria inexistente'
        ];
    }
}
