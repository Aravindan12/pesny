<?php

namespace App\Http\Controllers\Admins\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class RolesAndPermissionController extends Controller
{
    public function __construct(Role $role, Permission $permission){
        $this->role = $role;
        $this->permission = $permission;
    }

    public function navigateToRoles(){
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

    public function addPermissionToRole(Request $request){
        $roleToAssignPermission = $this->role->where('id',$request->role_id)->first();
        $assignPermissionToRole = $roleToAssignPermission->syncPermissions($request->permission_id);
        $d =Role::findByName($roleToAssignPermission->name)->permissions;

        return redirect()->action([RolesAndPermissionController::class, 'navigateToRoles']);
    }
}
