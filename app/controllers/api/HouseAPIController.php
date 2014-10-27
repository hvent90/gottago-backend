<?php namespace App\Controllers\Api;

class HouseAPIController extends \BaseController {

	public function returnTenantsOfHouse()
	{
		$house = \House::find(\Request::get('houseId'));

		// $tenantsAndTheirActivities = \Activity::getActivitiesOfTenantAndHouse($house);


		return \Response::json($house->tenants()->get());
	}

	public function createHouse()
	{
		$request = json_decode(\Request::instance()->getContent(), true);

		$house = \House::createHouse($request['name'], $request['key']);
		$tenant = \Tenant::find($request['tenant_id']);

		if ($house == null)
		{
			return \Response::json(false);
		}

		$tenant->joinHouse($house->id);

		return \Response::json($house);
	}

	public function joinHouse()
	{
		$request = json_decode(\Request::instance()->getContent(), true);

		$house  = \House::find($request['house_id']);
		$tenant = \Tenant::find($request['tenant_id']);

		if ( $request['key'] == $house->key ) {
			$tenant->joinHouse(Request::get('house_id'));

			return \Response::json($house);
		}

		return \Response::json(false);
	}

	public function leaveHouse()
	{
		$request = json_decode(\Request::instance()->getContent(), true);

		$house  = \House::find($request['house_id']);
		$tenant = \Tenant::find($request['tenant_id']);

		if ($tenant->leaveHouse($house->id)) {
			return \Response::json(true);
		} else {
			return \Response::json(false);
		}

	}

}