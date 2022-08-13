<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavbarController extends Controller
{
    public function userCompanies()
    {
        //abort_if(Gate::denies('read-common-users'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sets = user()->companies()->get();

        $usercompanies = array();

        foreach ($sets as $set) {
            if ($set->id == user()->current_company)
                continue;

            $usercompanies[] = collect([
                'id' => $set->id,
                'name' => setting('company.name', '', $set->id)
            ]);
        }


        return response([
            'meta' => [
                'usercompanies' => $usercompanies,

            ],
        ]);
    }
}
