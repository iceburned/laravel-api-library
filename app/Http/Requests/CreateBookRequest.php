<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBookRequest extends FormRequest
{
    public function rules()
    {
        return [
            "name" => "required|string",
            "author_id" => "required|integer"
        ];
    }
}
