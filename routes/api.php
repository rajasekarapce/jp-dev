<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    
    Route::post('auth/login', 'UsersApiController@auth');
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::post('users/media', 'UsersApiController@storeMedia')->name('users.storeMedia');
    Route::apiResource('users', 'UsersApiController');

    // Menu Types
    Route::apiResource('menu-types', 'MenuTypeApiController');

    // Menus
    Route::post('menus/media', 'MenuApiController@storeMedia')->name('menus.storeMedia');
    Route::apiResource('menus', 'MenuApiController');

    // Sub Menus
    Route::post('sub-menus/media', 'SubMenuApiController@storeMedia')->name('sub-menus.storeMedia');
    Route::apiResource('sub-menus', 'SubMenuApiController');

    // Orders
    Route::apiResource('orders', 'OrderApiController');

    // Tables
    Route::apiResource('tables', 'TableApiController');
});