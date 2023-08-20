<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            "user_id" => "required|integer"
        ];
    }
}
