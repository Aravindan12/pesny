<?php

namespace App\Services;

use App\Repositories\Eloquent\RoleRepository;
use App\Repositories\Eloquent\PermissionRepository;

class RolesAndPermissionService{

    /**
     * @return mixed
     */
    public function getAll(){
        $allroles = new RoleRepository();
        return $allroles->getAllRoles();
    }

    public function checkAddOrRemovePermission($id,$role_id){
        if($id == 1){
            $getRolesAssigned = new RoleRepository();
           $get = $getRolesAssigned->getPermissionsAssignedToRole($role_id);
           $permission = array();
           foreach($get->permissions as $rolePermission){
               $p['id'] = $rolePermission->id;
               $p['name'] = $rolePermission->name;
               array_push($permission,$p );
           }
           return $permission;

        }else{
            $getRolesNotAssigned = new RoleRepository();
            $getRolesNotAssigned->getPermissionsNotAssignedTORole($role_id);
        }
    }
}

