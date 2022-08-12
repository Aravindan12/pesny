<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admins\Admin\RolesAndPermissionController;


    Route::get('admin/', function () {
        return view('admins.admin.dashboard');
    });

    // Roles and Permission Routes
    Route::get('admin/roles',[RolesAndPermissionController::class,'navigateToRoles'])->name('admin.roles');

    Route::post('admin/add_role',[RolesAndPermissionController::class,'addNewRole'])->name('admin.add_new_role');

    Route::get('admin/permissions',[RolesAndPermissionController::class,'navigateToPermissions'])->name('admin.permissions');

    Route::post('admin/open_permissions_role/{id}',[RolesAndPermissionController::class,'openPermissionsForRole'])->name('admin.open_permission_for_role');

    Route::post('admin/add_permission',[RolesAndPermissionController::class,'addNewPermission'])->name('admin.add_new_permission');

    Route::post('admin/remove_permission_to_role',[RolesAndPermissionController::class,'removePermissionToRole'])->name('admin.remove_permission_to_role');

