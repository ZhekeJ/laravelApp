<?php

namespace App\Http\Requests\Auth;

use App\Models\Permission;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePermissionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('update-auth-permissions');
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
