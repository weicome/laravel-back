<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Filters\AdminUserFilter;
use App\Http\Requests\Back\AdminUser\AdminUserDestroyRequest;
use App\Http\Requests\Back\AdminUser\AdminUserIndexRequest;
use App\Http\Requests\Back\AdminUser\AdminUserShowRequest;
use App\Http\Requests\Back\AdminUser\AdminUserStoreRequest;
use App\Http\Requests\Back\AdminUser\AdminUserUpdateRequest;
use App\Http\Resources\Back\AdminUserResource;
use App\Models\AdminUser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Jiannei\Response\Laravel\Support\Facades\Response;

class AdminUserController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index(AdminUserIndexRequest $request, AdminUserFilter $filter): JsonResponse|JsonResource
    {
        //
        $model = AdminUser::filter($filter)->simplePaginate();
        return Response::success(AdminUserResource::collection($model));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminUserStoreRequest $request): JsonResponse|JsonResource
    {
        //
        $validated = $request->validated();
        $model = AdminUser::create($validated);
        return $model?->roles()->sync($validated['role']) ? Response::ok('ok') : Response::fail('no');
    }

    /**
     * Display the specified resource.
     */
    public function show(AdminUserShowRequest $request): JsonResponse|JsonResource
    {
        //
        $model = AdminUser::query()->findOrFail($request->id);
        return Response::success(new AdminUserResource($model));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminUserUpdateRequest $request): JsonResponse|JsonResource
    {
        //
        $validated = $request->validated();
        $model = AdminUser::query()->findOrFail($request->id);
        return $model->save($validated) && $model->roles()->sync($validated['role'])
            ? Response::ok() : Response::fail();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdminUserDestroyRequest $request): JsonResponse|JsonResource
    {
        //
        $model = AdminUser::query()->findOrFail($request->id);
        $model->roles()->detach();
        return  $model->delete() ? Response::ok() : Response::fail();
    }
}
