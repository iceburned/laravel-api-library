<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
    public function rules()
    {
        return [
            "book_id" => "required|integer",
            "title" => "required|string"
        ];
    }
}
