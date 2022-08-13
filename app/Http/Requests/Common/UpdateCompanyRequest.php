<?php

namespace App\Http\Requests\Common;


use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('update-common-companies');
    }

    public function rules()
    {
        return [

            'domain'         => [
                'string',
            ],
            'active'         => [
                'boolean',
                'required',
            ]
        ];
    }
}
