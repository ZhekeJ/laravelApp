<?php

namespace App\Http\Requests\Common;

use Illuminate\Http\Response;

use App\Models\Common\Company;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('create-common-companies');
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
