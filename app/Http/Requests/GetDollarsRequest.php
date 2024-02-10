<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class GetDollarsRequest extends FormRequest
{
    // ! IMPORTANT: your app or http client needs to set 'Accept: application/json' in their headers to receive json error responses
    public function rules(): array
    {
        return [
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
        ];
    }
}
