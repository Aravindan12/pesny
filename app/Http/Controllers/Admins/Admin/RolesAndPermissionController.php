<?php

namespace App\Http\Controllers\Admins\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use App\Services\RolesAndPermissionService;


class RolesAndPermissionController extends Controller
{
    public function __construct(Role $role, Permission $permission){
        $this->role = $role;
        $this->permission = $permission;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function navigateToRoles(){
//        $rolesAndPermissionService = new RolesAndPermissionService();
//        $roles = $rolesAndPermissionService->getAll();
        $roles = $this->role->with('permissions')->get();
        $permissions = $this->permission->with('roles')->get();

        $role_has_permissions = DB::table('role_has_permissions')->join('roles','roles.id','=','role_has_permissions.role_id')->join('permissions','permissions.id','=','role_has_permissions.permission_id')->select('roles.id as role_id','roles.name as role_name','permissions.id as permission_id','permissions.name as permission_name')->get();
        return view('admins.admin.roles',compact('roles','permissions','role_has_permissions'));
    }

    public function addNewRole(Request $request){
        $this->role->create([
            'name' => $request->new_role,
        ]);

        return redirect()->action([RolesAndPermissionController::class, 'navigateToRoles']);
    }

    public function navigateToPermissions(){
        $roles = $this->role->get();
        $permissions = $this->permission->get();
        return view('admins.admin.permissions',compact('roles','permissions'));
    }

    public function addNewPermission(Request $request){
        $this->permission->create([
            'name' => $request->new_permission,
        ]);

        return redirect()->action([RolesAndPermissionController::class, 'navigateToPermissions']);
    }

    public function removePermissionToRole(Request $request){
        $roleToAssignPermission = $this->role->where('id',$request->role_id)->first();
        $roleToAssignPermission->syncPermissions($request->permission_id);
        Role::findByName($roleToAssignPermission->name)->permissions;

        return redirect()->action([RolesAndPermissionController::class, 'navigateToRoles']);
    }

    public function openPermissionsForRole($id, Request $request){
        // dd($id,$request->all());
        $role_id = $request->id;
        $checkAddOrRemove = new RolesAndPermissionService();
        $checkRole = $checkAddOrRemove->checkAddOrRemovePermission($id,$role_id);
        return $checkRole;
    }
}
