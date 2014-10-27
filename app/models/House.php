<?php

class House extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'houses';

	/**
	 * The attributes included in the model's JSON form.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'address', 'bio'];

	public static function createHouse($name, $key, $address = null, $bio = null)
	{
		$house = new House;
		$house->name    = $name;
		$house->key     = $key;
		$house->address = $address;
		$house->bio     = $bio;
		$house->save();

		return $house;
	}

	public function editHouse($name = null, $address = null, $bio = null)
	{
		if ($name != null) {
			$this->name = $name;
		}

		if ($address != null) {
			$this->address = $address;
		}

		if ($bio != null) {
			$this->bio = $bio;
		}

		$this->save();

		return 'New house info! Woo! Shoot me an email, you programmer you.';
	}

	public function destroyHouse()
	{
		$this->delete();

		return 'Bye bye house! Shoot me an email you spiffy programmer!';
	}

	public function tenants()
	{
		return $this->belongsToMany('Tenant', 'tenant_house', 'house_id', 'tenant_id')->withTimeStamps();
	}

}
