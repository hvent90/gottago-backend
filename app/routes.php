<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//=============================================================================
// API
//=============================================================================
Route::post('api/houses/create-house', [
	'as'   => 'api.houses.create-house',
	'uses' => 'App\Controllers\Api\HouseAPIController@createHouse'
]);

Route::post('api/houses/join-house', [
	'as'   => 'api.houses.join-house',
	'uses' => 'App\Controllers\Api\HouseAPIController@joinHouse'
]);

Route::post('api/houses/leave-house', [
	'as'   => 'api.houses.leave-house',
	'uses' => 'App\Controllers\Api\HouseAPIController@leaveHouse'
]);

Route::get('api/houses/getTenants', [
	'as'   => 'api.houses.get-tenants',
	'uses' => 'App\Controllers\Api\HouseAPIController@returnTenantsOfHouse'
]);

Route::get('api/tenants/getUser', [
	'as'   => 'api.tenants.get-user',
	'uses' => 'App\Controllers\Api\TenantAPIController@returnUser'
]);

Route::post('api/tenants/login', [
	'as'   => 'api.tenants.login',
	'uses' => 'App\Controllers\Api\TenantAPIController@login'
]);

Route::post('api/tenants/register', [
	'as'   => 'api.tenants.register',
	'uses' => 'App\Controllers\Api\TenantAPIController@register'
]);

Route::get('api/tenants/getHouses', [
	'as'   => 'api.tenants.get-houses',
	'uses' => 'App\Controllers\Api\TenantAPIController@returnHousesOfTenant'
]);



Route::get('/', [
	'as'   => 'home',
	'uses' => 'HomeController@index'
]);

Route::post('api/tenants/seturgency', [
	'as'   => 'api.activities.set-urgency',
	'uses' => 'App\Controllers\Api\ActivityAPIController@setUrgency'
]);

//=============================================================================
// Tenants
//=============================================================================
Route::get('tenants', [
	'as'   => 'tenants.index',
	'uses' => 'TenantController@index'
]);

Route::get('tenants/create', [
	'as'   => 'tenants.create',
	'uses' => 'TenantController@create'
]);

Route::post('tenants/create', [
	'as'   => 'tenants.store',
	'uses' => 'TenantController@store'
]);

Route::get('tenants/edit', [
	'as'   => 'tenants.edit',
	'uses' => 'TenantController@edit'
]);

Route::post('tenants/edit', [
	'as'   => 'tenants.update',
	'uses' => 'TenantController@update'
]);

Route::delete('tenants', [
	'as'   => 'tenants.destroy',
	'uses' => 'TenantController@destroy'
]);

Route::post('login', [
	'as'   => 'tenants.login',
	'uses' => 'TenantController@login'
]);

Route::get('logout', [
	'as'   => 'tenants.logout',
	'uses' => 'TenantController@logout'
]);


//=============================================================================
// Houses
//=============================================================================
Route::get('houses', [
	'as'   => 'houses.index',
	'uses' => 'HouseController@index'
]);

Route::get('houses/create', [
	'as'   => 'houses.create',
	'uses' => 'HouseController@create'
]);

Route::post('houses/create', [
	'as'   => 'houses.store',
	'uses' => 'HouseController@store'
]);

Route::get('houses/edit', [
	'as'   => 'houses.edit',
	'uses' => 'HouseController@edit'
]);

Route::post('houses/edit', [
	'as'   => 'houses.update',
	'uses' => 'HouseController@update'
]);

Route::delete('houses', [
	'as'   => 'houses.destroy',
	'uses' => 'HouseController@destroy'
]);

Route::get('houses/connect', [
	'as'   => 'houses.connect',
	'uses' => 'HouseController@connect'
]);

Route::get('houses/disconnect', [
	'as'   => 'houses.disconnect',
	'uses' => 'HouseController@disconnect'
]);
//=============================================================================
// Activities
//=============================================================================
Route::get('activities', [
	'as'   => 'activities.index',
	'uses' => 'ActivityController@index'
]);

Route::get('activities/create', [
	'as'   => 'activities.create',
	'uses' => 'ActivityController@create'
]);

Route::post('activities/create', [
	'as'   => 'activities.store',
	'uses' => 'ActivityController@store'
]);

Route::get('activities/edit', [
	'as'   => 'activities.edit',
	'uses' => 'ActivityController@edit'
]);

Route::post('activities/edit', [
	'as'   => 'activities.update',
	'uses' => 'ActivityController@update'
]);

Route::delete('activities', [
	'as'   => 'activities.destroy',
	'uses' => 'ActivityController@destroy'
]);