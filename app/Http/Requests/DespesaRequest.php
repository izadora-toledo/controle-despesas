<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class DespesaRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        return [
            'descricao' => 'required|string|max:255',
            'data' => 'required|date',
            'valor' => 'required|numeric|min:0',
        ];
    }
}
