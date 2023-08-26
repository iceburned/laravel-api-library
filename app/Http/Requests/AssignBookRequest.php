<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignBookRequest extends FormRequest
{
    public function rules()
    {
        return [
            "user_id" => "required|integer",
            "book_id" => "required|integer"
        ];
    }
}
