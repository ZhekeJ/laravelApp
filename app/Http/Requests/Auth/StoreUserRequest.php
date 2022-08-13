<?php

namespace App\Http\Requests\Auth;


use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('create-auth-users');
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
                'unique:users',
            ],
            'password'   => [
                'required',
            ],
            /*  'roles'      => [
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
