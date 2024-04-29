<?php

//ambiente de validações ,  jeito certo de fazer

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class StoreUpdateSupport extends FormRequest
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
        'subject' => [
            'required',
            'max:255',
            'min:3',
            // Regra personalizada para verificar a unicidade de subject e body combinados
            Rule::unique('supports')->where(function ($query) {
                return $query->where('subject', $this->subject)
                             ->where('body', $this->body);
            }),
        ],
        'body' => [
            'required',
            'min:3',
            'max:100000',
        ],
    ];
}

}
