<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            "name" => "string",
            "email" => "email",
            "phone" => "string",
            "password" => "string",
            "user_id" => "integer"
        ];
    }
}
