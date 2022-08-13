<?php

namespace App\Http\Requests\Auth;

use App\Models\Role;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRoleRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('create-auth-roles');
    }

    public function rules()
    {
        return [
            'title'            => [
                'string',
                'required',
            ],
            'display_name'            => [
                'string',
                'required',
            ],
            /*  'permissions'      => [
                'required',
                'array',
            ],
            'permissions.*.id' => [
                'integer',
                'exists:permissions,id',
            ],*/
        ];
    }
}
