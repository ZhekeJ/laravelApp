<?php

namespace App\Http\Requests\Auth;

use App\Models\Role;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRoleRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('update-auth-roles');
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
            /* 'permissions'      => [
                'required',
                'array',
            ],
            'permissions.*' => [
                'integer',
                'exists:permissions,id',
            ],*/
        ];
    }
}
