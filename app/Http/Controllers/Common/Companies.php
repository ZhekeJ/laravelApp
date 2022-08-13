<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Response;
use App\Models\Common\Company;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Resources\Common\CompanyResource;
use App\Http\Requests\Common\StoreCompanyRequest;
use App\Http\Requests\Common\UpdateCompanyRequest;


class Companies extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('read-common-companies'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CompanyResource(Company::all());
    }

    public function store(StoreCompanyRequest $request)
    {
        $company = Company::create($request->validated());
        if ($request->name) {
            setSetting('company.name', $request->name, $company->id);
        }
        if ($request->address) {
            setSetting('company.address', $request->address, $company->id);
        }
        if ($request->email) {
            setSetting('company.email', $request->email, $company->id);
        }


        return (new CompanyResource($company))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(Company $company)
    {
        abort_if(Gate::denies('create-common-companies'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [],
        ]);
    }

    public function show(Company $company)
    {
        abort_if(Gate::denies('read-common-companies'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CompanyResource($company);
    }

    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $company->update($request->validated());

        if ($request->name) {
            setSetting('company.name', $request->name, $company->id);
        }
        if ($request->address) {
            setSetting('company.address', $request->address, $company->id);
        }
        if ($request->email) {
            setSetting('company.email', $request->email, $company->id);
        }

        return (new CompanyResource($company))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Company $company)
    {
        abort_if(Gate::denies('update-common-companies'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new CompanyResource($company),
            'meta' => [],
        ]);
    }

    public function destroy(Company $company)
    {
        abort_if(Gate::denies('delete-common-companies'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $company->delete();

        removeCompanySetting($company->id);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
