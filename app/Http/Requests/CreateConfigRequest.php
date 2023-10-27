<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateConfigRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'slide'     =>  'required',
            'images'    =>  'required',
        ];
    }
}
