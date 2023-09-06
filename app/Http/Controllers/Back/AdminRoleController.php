<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;

class AdminRoleController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index(AdminMenuIndexRequest $request, AdminMenuFilter $filter): JsonResponse|JsonResource
    {
        //
        $result = AdminMenu::filter($filter)->get();
        return Response::success(AdminMenuResource::collection($result));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRoleStoreRequest $request): JsonResponse|JsonResource
    {
        //
        $validated = $request->validated();
        $result = AdminMenu::create($validated);
        return $result ? Response::ok() : Response::fail();
    }

    /**
     * Display the specified resource.
     */
    public function show(AdminRoleShowRequest $request): JsonResponse|JsonResource
    {
        //
        $result = AdminMenu::query()->findOrFail($request->id);
        return Response::success(AdminMenuResource::collection($result));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRoleUpdateRequest $request): JsonResponse|JsonResource
    {
        //
        $result = AdminMenu::query()->findOrFail($request->id);
        return $result->save($request->validated()) ? Response::ok() : Response::fail();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdminMenuDestroyRequest $request): JsonResponse|JsonResource
    {
        //
        $result = AdminMenu::destroy($request->id);
        return $result ? Response::ok() : Response::fail();
    }
}
