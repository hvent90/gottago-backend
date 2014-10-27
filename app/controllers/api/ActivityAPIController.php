<?php namespace App\Controllers\Api;

class ActivityAPIController extends \BaseController {

	public function setUrgency()
	{
		$formData = \Input::only('email', 'password');

		// First we fetch the Request instance
		$request = json_decode(\Request::instance()->getContent(), true);

		$activity = $request['activity'];
		$urgency  = $request['urgency'];
		$tenant   = \Tenant::find($request['tenant']);

		$tenant->{$activity} = $urgency;
		$tenant->save();

		return \Response::json($tenant);
	}

}