<?php

namespace App\Http\Controllers;

use App\Models\ClearService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use App\Http\Resources\ClearServiceResource;

class ClearServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // abort_if(Gate::denies('read-clear-service'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // return new ClearServiceResource(ClearService::all());

        $clearService = clearService::query()   
                  ->latest('id') 
                  ->get();
    }

    /**
     * Show the form for creating a new resource.
     *  @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return new ClearServiceResource(ClearService::create($request->all()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // abort_if(Gate::denies('create-clear-service'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ClearServiceResource(ClearService::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClearService  $clearService
     * @return \Illuminate\Http\Response
     */
    public function show(ClearService $clearService)
    {
       // abort_if(Gate::denies('read-clear-service'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ClearServiceResource($clearService);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClearService  $clearService
     * @return \Illuminate\Http\Response
     */
    public function edit(ClearService $clearService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClearService  $clearService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClearService $clearService)
    {
        $clearService->update($request->all());
        return response()->json([
            'message' => "ClearService updated successfully",
            'ClearService' => $clearService
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClearService  $clearService
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ClearService $clearService)
    {
        $clearService ->delete();
        return response()->json([
            'message' => "Service has been deleted successfully",
        ]);
    }
}
