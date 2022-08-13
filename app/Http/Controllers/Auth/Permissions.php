<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Auth\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Resources\Auth\PermissionResource;
use App\Http\Requests\Auth\StorePermissionRequest;
use App\Http\Requests\Auth\UpdatePermissionRequest;

class Permissions extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('read-auth-permissions'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PermissionResource(Permission::all());
    }

    public function store(StorePermissionRequest $request)
    {
        $permission = Permission::create($request->validated());

        return (new PermissionResource($permission))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(Permission $permission)
    {
        abort_if(Gate::denies('create-auth-permissions'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [],
        ]);
    }

    public function show(Permission $permission)
    {
        abort_if(Gate::denies('read-auth-permissions'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PermissionResource($permission);
    }

    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        $permission->update($request->validated());

        return (new PermissionResource($permission))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Permission $permission)
    {
        abort_if(Gate::denies('update-auth-permissions'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new PermissionResource($permission),
            'meta' => [],
        ]);
    }

    public function destroy(Permission $permission)
    {
        abort_if(Gate::denies('delete-auth-permissions'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permission->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
