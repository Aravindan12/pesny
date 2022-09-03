<?php

namespace App\Repositories\Eloquent;

use Spatie\Permission\Models\Permission;

class PermissionRepository{

    public function allPermissions(){
       return Permission::get();
    }

    public function getPermissions($permissionId){
        return Permission::where('id','!=',$permissionId)->get();
    }

}
