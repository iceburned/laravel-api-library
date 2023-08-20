<?php

namespace App\Http\Requests;

class UpdateBookRequest
{
    public function rules()
    {
        return [
            "name" => "required|string"
        ];
    }
}
