<?php

namespace App\Repositories\Eloquent;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleRepository{

    public function getAllRoles(){
        return Role::get();
    }

    public function getRoleById($id){
        return Role::where('id',$id)->first();
    }

    public function getPermissionsAssignedToRole($role_id){

         return Role::where('id',$role_id)->with('permissions')->first();
    }

    public function getPermissionsNotAssignedTORole($role_id){
        $role = $this->getRoleById($role_id)->select('id')->get()->toArray();
        // dd($role);
        $permissions = Permission::doesntHave('roles')->get();
        dd($permissions); 
       dd( Permission::whereHas('roles', function($q) use($role_id){
            $q->where('roles.id','!=',$role_id)->get();
        }));
        dd(Role::where('id',$role_id)->with('permissions')->whereHas('permissions', function($q) use($role_id){
            $q->where('role_id','!=',$role_id);
        })->get());
    }
}
