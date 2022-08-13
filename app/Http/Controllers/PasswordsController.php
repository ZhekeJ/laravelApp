<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class PasswordsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'changePassword']);
    }


    public function changePassword(Request $request)
    {

        $user = user();

        if ($request['password'] != $request['password_confirmation']) {
            throw ValidationException::withMessages([
                'password' => __('auth.passwordsnotmatching'),
            ]);
        }

        if (!Hash::check($request['current_password'], $user->password)) {
            throw ValidationException::withMessages([
                'password' => __('auth.currentpasswordfailed'),
            ]);
        }


        $user->password = $request['password'];
        $user->password_expired = false;
        if (!$user->never_expire) {
            $user->password_expiry_date = Carbon::now()->addDays(setting('auth.password_age'));
        }
        $user->save();


        return response(null, Response::HTTP_ACCEPTED);
    }
}
