<?php

class HouseController extends BaseController {

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
		$houses = House::all();

		$tenants = Tenant::all();

		$tenant = Tenant::first();

		// dd($tenant->houses());

		return View::make('houses.index', compact([
			'houses',
			'tenants'
		]));
	}

	public function create()
	{
		return View::make('houses.create');
	}

	public function store()
	{
		House::createHouse(
			Input::get('name'),
			Input::get('address'),
			Input::get('bio')
		);

		return Redirect::route('houses.index');
	}

	public function connect()
	{
		$tenant = Tenant::find(Request::get('tenantId'));

		$tenant->joinHouse(Request::get('houseId'));


		return Redirect::route('houses.index');
	}

	public function disconnect()
	{
		$tenant = Tenant::find(Request::get('tenantId'));

		$tenant->leaveHouse(Request::get('houseId'));


		return Redirect::route('houses.index');
	}

	public function edit()
	{
		$house = House::find(Request::get('house_id'));

		return View::make('houses.edit', compact([
			'house'
		]));
	}

	public function update()
	{
		$house = House::find(Input::get('house_id'));

		$name 	 = Input::get('name');
		$address = Input::get('address');
		$bio     = Input::get('bio');

		$house->updateHouse($name, $address, $bio);

		return Redirect::route('houses.index');
	}


	public function destroy()
	{
		$house = House::find(Request::get('house_id'));

		$house->destroyHouse();

		return Redirect::route('houses.index');
	}

}
