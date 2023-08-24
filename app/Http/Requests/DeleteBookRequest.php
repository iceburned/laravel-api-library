<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteBookRequest extends FormRequest
{
    public function rules()
    {
        return [
            "book_id" => "required|integer",
            "author_id" => "required|integer"
        ];
    }
}
