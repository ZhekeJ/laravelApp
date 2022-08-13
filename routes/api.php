<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    LoginController,
    LogoutController,
    RegisterController,
    UserController,
};

// Auth ...
Route::post('/login', LoginController::class);
Route::post('/register', RegisterController::class);
Route::post('/logout', LogoutController::class);


Route::get('/user', UserController::class)->middleware('auth:sanctum');

Route::group(
    ['prefix' => 'api', 'namespace' => 'App\\Http\\Controllers', 'middleware' => ['auth:sanctum']],
    function () {
        // Permissions
        Route::resource('auth/permissions', 'Auth\Permissions');

        // Roles
        Route::resource('auth/roles', 'Auth\Roles');

        Route::get('auth/abilities', 'Auth\Abilities@index');
        // Users

        Route::get('auth/user/{company_id}/switch-companies', 'Auth\Users@switchCompany');
        Route::resource('auth/users', 'Auth\Users');

        // Companies
        Route::resource('common/companies', 'Common\Companies');

        //Passwords
        Route::post('auth/change-password', 'PasswordsController@changePassword');

        Route::get('navbar/user-companies', 'NavbarController@userCompanies');


        Route::resource('clear-service','ÇlearServiceController');
    }
);
