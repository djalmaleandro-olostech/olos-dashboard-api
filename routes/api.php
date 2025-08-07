<?php

use App\Http\Controllers\{
    AuthController,
    MenuController,
    RoleController,
    UserController,
    EmployeeController,
    SquadController,
    MetricController
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::post('login', 'login')->name('login');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
    Route::post('me', 'me')->name('me');
});

/**
 * Admin
 */
Route::prefix('users')->middleware('auth')->controller(UserController::class)->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/', 'index')->middleware('check.permissions:users,view');
    Route::get('/{id}', 'show')->middleware('check.permissions:users,view');
    Route::put('/{id}', 'update')->middleware('check.permissions:users,update');
    Route::post('/', 'store')->middleware('check.permissions:users,create');
    Route::put('/{id}/status', 'changeStatus')->middleware('check.permissions:users,update');
    Route::delete('/{id}', 'destroy')->middleware('check.permissions:users,update');
});

Route::prefix('roles')->middleware('auth')->controller(RoleController::class)->group(function () {
    Route::get('/getactive', 'getActive');
    Route::get('/', 'index')->middleware('check.permissions:roles,view');
    Route::get('/{id}', 'show')->middleware('check.permissions:roles,view');
    Route::put('/{id}', 'update')->middleware('check.permissions:roles,update');
    Route::post('/', 'store')->middleware('check.permissions:roles,create');
    Route::put('/{id}/status', 'changeStatus')->middleware('check.permissions:roles,update');
    Route::delete('/{id}', 'destroy')->middleware('check.permissions:roles,update');
});

Route::prefix('menus')->middleware('auth')->controller(MenuController::class)->group(function () {
    Route::get('/getbyroles', 'getByRoles');
    Route::get('/getactive', 'getActive');
    Route::get('/', 'index')->middleware('check.permissions:menus,view');
    Route::get('/{id}', 'show')->middleware('check.permissions:menus,view');
    Route::put('/{id}', 'update')->middleware('check.permissions:menus,update');
    Route::post('/', 'store')->middleware('check.permissions:menus,create');
    Route::put('/{id}/status', 'changeStatus')->middleware('check.permissions:menus,update');
    Route::delete('/{id}', 'destroy')->middleware('check.permissions:menus,update');
});

/**
 * Person
 */
Route::prefix('squads')->middleware('auth')->controller(SquadController::class)->group(function () {
    Route::get('/getactive', 'getActive');
    Route::get('/', 'index')->middleware('check.permissions:squads,view');
    Route::get('/{id}', 'show')->middleware('check.permissions:squads,view');
    Route::put('/{id}', 'update')->middleware('check.permissions:squads,update');
    Route::post('/', 'store')->middleware('check.permissions:squads,create');
    Route::put('/{id}/status', 'changeStatus')->middleware('check.permissions:squads,update');
    Route::delete('/{id}', 'destroy')->middleware('check.permissions:squads,update');
});

Route::prefix('employees')->middleware('auth')->controller(EmployeeController::class)->group(function () {
    Route::get('/getactive', 'getActive');
    Route::get('/', 'index')->middleware('check.permissions:employees,view');
    Route::get('/{id}', 'show')->middleware('check.permissions:employees,view');
    Route::put('/{id}', 'update')->middleware('check.permissions:employees,update');
    Route::post('/', 'store')->middleware('check.permissions:employees,create');
    Route::put('/{id}/status', 'changeStatus')->middleware('check.permissions:employees,update');
    Route::delete('/{id}', 'destroy')->middleware('check.permissions:employees,update');
});


Route::prefix('metrics')->middleware('auth')->controller(MetricController::class)->group(function () {
    Route::get('/', 'index')->middleware('check.permissions:metrics,view');
});