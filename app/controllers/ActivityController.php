<?php

class ActivityController extends BaseController {

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
		$activities = Activity::all();

		return View::make('activities.index', compact([
			'activities'
		]));
	}

	public function create()
	{
		return View::make('activities.create');
	}

	public function store()
	{
		Activity::createActivity(
			Input::get('name'),
			Input::get('description')
		);

		return Redirect::to('activities.index');
	}

	public function edit()
	{
		$activity = Activity::find(Request::get('activity_id'));

		return View::make('activities.edit', compact([
			'activity'
		]));
	}

	public function update()
	{
		$activity = Activity::find(Input::get('activity_id'));

		$name 		 = Input::get('name');
		$description = Input::get('description');

		$activity->updateActivity($name, $description);

		return Redirect::to('activities.index');
	}


	public function destroy()
	{
		$activity = Activity::find(Request::get('activity_id'));

		$activity->destroyActivity();

		return Redirect::to('activities.index');
	}

}
