<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Notes:角色添加
     * User: xiaofeng
     * DateTime: 2023/5/25 19:31
     * @param RoleRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(RoleRequest $request)
    {
        $data = $request->validated();
        $role = Role::create($data + ['guard_name' => 'admin']);
        return response()->json($role);
    }

    /**
     * Notes:角色列表
     * User: xiaofeng
     * DateTime: 2023/5/25 19:31
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $role = Role::query()->paginate($request->get('per_page', 20));
        return response()->json($role);
    }

    /**
     * Notes:角色编辑
     * User: xiaofeng
     * DateTime: 2023/5/25 21:02
     * @param RoleRequest $request
     * @param Role $role
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(RoleRequest $request, Role $role)
    {
        $role->name = $request->name;
        $role->save();
        return response()->json($role);
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return response()->json(null, 204);
    }
}
