<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

class LoginController extends Controller
{
    public function __invoke()
    {
        request()->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required'],
        ]);

        /**
         * We are authenticating a request from our frontend.
         */
        if (EnsureFrontendRequestsAreStateful::fromFrontend(request())) {
            $this->authenticateFrontend();
        }
        /**
         * We are authenticating a request from a 3rd party.
         */
        else {
            // Use token authentication.
        }

        if (!user()->active) {
            throw ValidationException::withMessages([
                'email' => __('auth.locked'),
            ]);
        }

        if (user()->companies()->count() === 0) {

            throw ValidationException::withMessages([
                'email' => __('auth.nocompanies'),
            ]);
        }

        $this->setCompany();
    }

    private function authenticateFrontend()
    {
        if (!Auth::guard('web')
            ->attempt(
                request()->only('email', 'password'),
                request()->boolean('remember')
            )) {
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }
    }

    private function setCompany()
    {
        $user = User::find(auth()->user()->id);
        $user->current_company = $user->home_company;
        $user->current_company_name = setting('company.name', 'N/A', $user->home_company);
        $user->save();
    }
}
