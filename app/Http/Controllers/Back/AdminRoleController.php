<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Filters\AdminRoleFilter;
use App\Http\Requests\Back\AdminRole\AdminRoleDestroyRequest;
use App\Http\Requests\Back\AdminRole\AdminRoleIndexRequest;
use App\Http\Requests\Back\AdminRole\AdminRoleShowRequest;
use App\Http\Requests\Back\AdminRole\AdminRoleStoreRequest;
use App\Http\Requests\Back\AdminRole\AdminRoleUpdateRequest;
use App\Http\Resources\Back\AdminRoleResource;
use App\Models\AdminRole;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Jiannei\Response\Laravel\Support\Facades\Response;

class AdminRoleController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index(AdminRoleIndexRequest $request, AdminRoleFilter $filter): JsonResponse|JsonResource
    {
        //
        $model = AdminRole::filter($filter)->simplePaginate();
        return Response::success(AdminRoleResource::collection($model));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRoleStoreRequest $request): JsonResponse|JsonResource
    {
        //
        $validated = $request->validated();
        $model = AdminRole::create($validated);
        return $model?->menus()->sync($validated['menus'] ?? []) ? Response::ok('ok') : Response::fail('no');
    }

    /**
     * Display the specified resource.
     */
    public function show(AdminRoleShowRequest $request): JsonResponse|JsonResource
    {
        //
        $model = AdminRole::query()->findOrFail($request->id);
        return Response::success(new AdminRoleResource($model));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRoleUpdateRequest $request): JsonResponse|JsonResource
    {
        //
        $validated = $request->validated();
        $model = AdminRole::query()->findOrFail($request->id);
        return $model->save($validated) && $model->menus()->sync($validated['menus'] ?? [])
            ? Response::ok('ok') : Response::fail('no');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdminRoleDestroyRequest $request): JsonResponse|JsonResource
    {
        //
        $model = AdminRole::query()->findOrFail($request->id);
        $model->menus()->detach();
        return $model->delete() ? Response::ok() : Response::fail();
    }
}
