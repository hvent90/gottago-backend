<?php

class TenantController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
		$tenants = Tenant::all();

		return View::make('tenants.index', compact([
			'tenants'
		]));
	}

	public function create()
	{
		return View::make('tenants.create');
	}

	public function store()
	{
		$tenant = Tenant::createTenant(
			Input::get('first_name'),
			Input::get('last_name'),
			Input::get('email'),
			Input::get('nickname'),
			Input::get('password'),
			Input::get('house_id')
		);

		Auth::user($tenant);

		return Redirect::to('tenants.index');
	}

	public function login()
	{
		$formData = Input::only('email', 'password');

		if (Auth::attempt($formData))
		{
			return Redirect::home();
		}

		return Redirect::home();
	}

	public function logOut()
	{
		Auth::logout();

		return Redirect::home();
	}

	public function edit()
	{
		$tenant = Tenant::find(Request::get('tenant_id'));

		return View::make('tenants.edit', compact([
			'tenant'
		]));
	}

	public function update()
	{
		$tenant = Tenant::find(Input::get('tenant_id'));

		$first_name  = Input::get('first_name');
		$last_name 	 = Input::get('last_name');
		$email       = Input::get('email');
		$nickname 	 = Input::get('nickname');
		$password    = Input::get('password');

		$tenant->updateTenant($first_name, $last_name, $email, $nickname, $password);

		return Redirect::to('tenants.index');
	}


	public function destroy()
	{
		$tenant = Tenant::find(Request::get('tenant_id'));

		$tenant->destroyTenant();

		return Redirect::to('tenants.index');
	}

}
