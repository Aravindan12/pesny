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

    Route::post('admin/add_permission',[RolesAndPermissionController::class,'addNewPermission'])->name('admin.add_new_permission');

    Route::post('admin/add_permission_to_role',[RolesAndPermissionController::class,'addPermissionToRole'])->name('admin.add_permission_to_role');

