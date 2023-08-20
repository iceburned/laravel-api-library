<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    public function rules(){

        return [
            'name' => ['required', 'string'],
            'email' => ['required', "email"],
            'password' => ['required', "string"],
            'phone' => ['required', "string"],
        ];
    }
}
