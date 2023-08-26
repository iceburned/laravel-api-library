<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetUserBooksRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id' => "required|integer"
        ];
    }
}
