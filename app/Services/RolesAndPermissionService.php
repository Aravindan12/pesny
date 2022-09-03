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

    public function checkAddOrRemovePermission(){
        $getPermissionsAll = new PermissionRepository();
        $getPermissions = $getPermissionsAll->allPermissions();
        $permission = array();
            foreach($getPermissions as $rolePermission){
               $p['id'] = $rolePermission->id;
               $p['name'] = $rolePermission->name;
               array_push($permission,$p);
            }
        return $permission;
    }
}

