<?php

class Activity extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'activities';

	/**
	 * The attributes included in the model's JSON form.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'description'];

	public static function createActivity($name, $description = null)
	{
		$activity = new Activity;
		$activity->name 	   = $name;
		$activity->description = $description;
		$activity->save();
	}

	public function updateActivity($name = null, $description = null)
	{
		if ($name != null) {
			$this->name = $name;
		}

		if ($description != null) {
			$this->description = $description;
		}

		$this->save();

		return 'Hey programmer. Shoot me an email!';
	}

	public function destroyActivity()
	{
		$this->delete();

		return 'Happy days. Hello programmer. Shoot me an email!';
	}

	public static function createActivitiesUponJoiningHouse($house_id, $tenant_id)
	{
		$shower = new Activity;
		$shower->name 	   = 'shower';
		$shower->tenant_id = $tenant_id;
		$shower->house_id  = $house_id;
		$shower->save();

		$pee = new Activity;
		$pee->name 	    = 'pee';
		$pee->tenant_id = $tenant_id;
		$pee->house_id  = $house_id;
		$pee->save();

		$poop = new Activity;
		$poop->name 	 = 'poop';
		$poop->tenant_id = $tenant_id;
		$poop->house_id  = $house_id;
		$poop->save();

		$activities = [
			$shower,
			$pee,
			$poop
		];


		return $activities;
	}

	public static function getActivitiesOfTenantAndHouse($house)
	{

		$tenantsAndTheirActivities = [];

		foreach ($house->tenants()->get() as $tenant) {
			$activities = Activity::where('house_id', $house->id)->where('tenant_id', $tenant->id)->get();
			$tenantsAndTheirActivities[] = [
				$tenant,
				$activities
			];
		}

		return $tenantsAndTheirActivities;
	}

}
