<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    /**
     * Notes:权限增加
     * User: xiaofeng
     * DateTime: 2023/5/25 21:42
     * @param PermissionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(PermissionRequest $request)
    {
        $data = $request->validated();
        $permission = Permission::query()->create($data + ['guard_name' => 'admin']);
        return response()->json($permission);
    }

    /**
     * Notes:权限编辑
     * User: xiaofeng
     * DateTime: 2023/5/25 21:49
     * @param PermissionRequest $request
     * @param Permission $permission
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(PermissionRequest $request, Permission $permission)
    {
        $permission->fill($request->validated());
        $permission->save();
        return response()->json($permission);
    }
}
