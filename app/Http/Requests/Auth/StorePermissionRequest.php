<?php

namespace App\Http\Requests\Auth;

use App\Models\Permission;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePermissionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('create-auth-permissions');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'display_name' => [
                'string',
                'required',
            ],
        ];
    }
}
