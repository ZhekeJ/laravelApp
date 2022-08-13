<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('update-auth-users');
    }

    public function rules()
    {
        return [
            'name'       => [
                'string',
                'required',
            ],
            'email'      => [
                'required',
                'unique:users,email,' . request()->route('user')->id,
            ],
            'password'   => [
                'nullable',
            ],
            /* 'roles'      => [
                'required',
                'array',
            ],
            'roles.*.id' => [
                'integer',
                'exists:roles,id',
            ],*/
            'home_company' => [
                'integer',
                'required',
            ],
            'password_expired' => [
                'boolean',
                'nullable',
            ],
            'never_expire' => [
                'boolean',
                'nullable',
            ],
        ];
    }
}
