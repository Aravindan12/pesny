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
        return $this->getRoleById($role_id)->select('id')->get()->toArray();

    }
}
