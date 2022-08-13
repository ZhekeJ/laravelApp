<?php

namespace App\Http\Controllers\Auth;

use App\Models\Auth\Role;
use App\Models\User;
use App\Models\Common\Company;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Resources\Auth\UserResource;
use App\Http\Requests\Auth\StoreUserRequest;
use App\Http\Requests\Auth\UpdateUserRequest;

class Users extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('read-auth-users'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UserResource(User::with(['roles'])->get());
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());

        $user->roles()->sync($request->input('roles.*', []));
        $user->companies()->sync($request->input('companies.*', []));

        return (new UserResource($user))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(User $user)
    {
        abort_if(Gate::denies('create-auth-users'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sets = Company::get(['id']);


        foreach ($sets as $set) {

            $companies[] = collect([
                'id' => $set->id,
                'name' => setting('company.name', '', $set->id)
            ]);
        }


        return response([
            'meta' => [
                'roles'   => Role::get(['id', 'display_name']),
                'companies' => $companies,

            ],
        ]);
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('read-auth-users'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userroles = array();
        $usercompanies = array();

        foreach ($user->roles as $role) {
            $userroles[] = $role->id;
        }
        unset($user->roles);
        $user->roles = $userroles;

        foreach ($user->companies as $company) {
            $usercompanies[] = $company->id;
        }
        unset($user->companies);
        $user->companies = $usercompanies;


        return new UserResource($user);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        $user->roles()->sync($request->input('roles.*', []));
        $user->companies()->sync($request->input('companies.*', []));

        return (new UserResource($user))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('update-auth-users'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new UserResource($user->load(['roles', 'company', 'branch'])),
            'meta' => [
                'roles'   => Role::get(['id', 'title']),
                //'companies' => Company::get(['id', 'name']),

            ],
        ]);
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('delete-auth-users'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function switchCompany($company_id)
    {

        $user = user();
        $user->current_company = $company_id;
        $user->current_company_name = setting('company.name', '', $company_id);
        $user->save();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
