<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Filters\AdminMenuFilter;
use App\Http\Requests\Back\AdminMenu\AdminMenuDestroyRequest;
use App\Http\Requests\Back\AdminMenu\AdminMenuIndexRequest;
use App\Http\Requests\Back\AdminMenu\AdminMenuShowRequest;
use App\Http\Requests\Back\AdminMenu\AdminMenuStoreRequest;
use App\Http\Requests\Back\AdminMenu\AdminMenuUpdateRequest;
use App\Http\Resources\Back\AdminMenuResource;
use App\Models\AdminMenu;
use App\Utils\TreeNode;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Jiannei\Response\Laravel\Support\Facades\Response;


class AdminMenuController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function tree(): JsonResponse|JsonResource
    {
        //
        $result = AdminMenu::query()->where('status',1)->orderBy('sort')->get();
        return Response::success(TreeNode::generateTree($result));
    }

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
    public function store(AdminMenuStoreRequest $request): JsonResponse|JsonResource
    {
        //
        $validated = $request->validated();
        $result = AdminMenu::create($validated);
        return $result ? Response::ok() : Response::fail();
    }

    /**
     * Display the specified resource.
     */
    public function show(AdminMenuShowRequest $request): JsonResponse|JsonResource
    {
        //
        $result = AdminMenu::query()->findOrFail($request->id);
        return Response::success(AdminMenuResource::collection($result));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminMenuUpdateRequest $request): JsonResponse|JsonResource
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
