<?php

namespace App\Http\Controllers\Auth;

use App\Models\Auth\Role;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Auth\Permission;
use App\Http\Controllers\Controller;
use App\Http\Resources\Auth\RoleResource;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Auth\StoreRoleRequest;
use App\Http\Requests\Auth\UpdateRoleRequest;

class Roles extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('read-auth-roles'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RoleResource(Role::with(['permissions'])->get());
    }

    public function store(StoreRoleRequest $request)
    {
        $role = Role::create($request->validated());
        $role->permissions()->sync($request->input('permissions.*', []));

        return (new RoleResource($role))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(Role $role)
    {
        abort_if(Gate::denies('create-auth-roles'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'permissions' => Permission::get(['id', 'title', 'display_name']),
            ],
        ]);
    }

    public function show(Role $role)
    {
        abort_if(Gate::denies('read-auth-roles'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = $role->permissions()->orderBy('id')->pluck('id');

        $role['permissions'] = $permissions;

        return new RoleResource($role);
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {

        $role->update($request->validated());
        $role->permissions()->sync($request->input('permissions.*', []));

        return (new RoleResource($role))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Role $role)
    {
        abort_if(Gate::denies('update-auth-roles'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new RoleResource($role->load(['permissions'])),
            'meta' => [
                'permissions' => Permission::get(['id', 'title']),
            ],
        ]);
    }

    public function destroy(Role $role)
    {
        abort_if(Gate::denies('delete-auth-roles'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
