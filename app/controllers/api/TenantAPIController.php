<?php namespace App\Controllers\Api;

class TenantAPIController extends \BaseController {

	public function login()
	{
		$formData = \Input::only('email', 'password');

		// First we fetch the Request instance
		$request = json_decode(\Request::instance()->getContent(), true);

		if (\Auth::attempt($request))
		{
			return \Response::json(\Auth::user());
		}

		return \Response::json(false);
	}

	public function register()
	{
		$formData = \Input::only('email', 'nickname', 'password');

		// First we fetch the Request instance
		$request = json_decode(\Request::instance()->getContent(), true);

		$tenant = \Tenant::createTenant(null, null, $request['email'], $request['nickname'], $request['password']);

		if ($tenant != null)
		{
			return \Response::json($tenant);
		}

		return \Response::json(false);
	}

	public function returnHousesofTenant()
	{
		$tenant = \Tenant::find(\Request::get('tenantId'));

		if ($tenant->houses()->get() == null) {
			return false;
		}

		return \Response::json($tenant->houses()->get());
	}

	public function returnUser()
	{
		$tenant = \Tenant::find(\Request::get('id'));

		return \Response::json($tenant);
	}

}