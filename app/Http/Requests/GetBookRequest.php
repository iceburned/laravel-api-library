<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetBookRequest extends FormRequest
{
    public function rules()
    {
        return [
            "book_id" => "required|integer"
        ];
    }
}
