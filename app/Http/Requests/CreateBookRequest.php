<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBookRequest extends FormRequest
{
    public function rules()
    {
        return [
            "title" => "required|string",
            "author_id" => "required|integer"
        ];
    }
}
