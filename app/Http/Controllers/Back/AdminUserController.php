<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Filters\AdminUserFilter;
use App\Http\Requests\Back\AdminUser\AdminUserIndexRequest;

class AdminUserController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index(AdminUserIndexRequest $request, AdminUserFilter $filter): JsonResponse|JsonResource
    {
        //
        $result = AdminUser::filter($filter)->get();
        return Response::success(AdminUserResource::collection($result));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminUserStoreRequest $request): JsonResponse|JsonResource
    {
        //
        $validated = $request->validated();
        $result = AdminUser::create($validated);
        return $result ? Response::ok() : Response::fail();
    }

    /**
     * Display the specified resource.
     */
    public function show(AdminUserShowRequest $request): JsonResponse|JsonResource
    {
        //
        $result = AdminUser::query()->findOrFail($request->id);
        return Response::success(AdminUserResource::collection($result));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminUserUpdateRequest $request): JsonResponse|JsonResource
    {
        //
        $result = AdminUser::query()->findOrFail($request->id);
        return $result->save($request->validated()) ? Response::ok() : Response::fail();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdminUserDestroyRequest $request): JsonResponse|JsonResource
    {
        //
        $result = AdminUser::destroy($request->id);
        return $result ? Response::ok() : Response::fail();
    }
}
