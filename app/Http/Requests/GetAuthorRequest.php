<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetAuthorRequest extends FormRequest
{

    public function rules()
    {
        return [
            "author_id" => "required|integer"
        ];
    }
}
