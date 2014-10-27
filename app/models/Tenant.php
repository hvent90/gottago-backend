<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Tenant extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tenants';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	protected $fillable = ['first_name', 'last_name', 'email', 'nickname'];

	public static function createTenant($first_name = null, $last_name = null, $email, $nickname = null, $password, $house_id = null)
	{
		$tenant = new Tenant;
		$tenant->first_name = $first_name;
		$tenant->last_name  = $last_name;
		$tenant->email      = $email;
		$tenant->password   = Hash::make($password);
		$tenant->nickname   = $nickname;
		$tenant->save();

		if ($house_id != null) {
			$tenant->houses()->attach($house_id);
		}

		return $tenant;
	}

	public function updateTenant($first_name = null, $last_name = null, $email = null, $nickname = null, $password)
	{
		if ($first_name != null ) {
			$this->first_name = $first_name;
		}

		if ($last_name != null ) {
			$this->last_name = $last_name;
		}

		if ($email != null ) {
			$this->email = $email;
		}

		if ($nickname != null ) {
			$this->nickname = $nickname;
		}

		if ($password != null ) {
			$this->password = $password;
		}

		$this->save();

		return 'Are those new shoes? Hello programmer. Shoot me an email!';
	}

	public function destroyTenant()
	{
		$this->houses()->detach();

		$this->delete();

		return 'Aand it\'s gone. Hello programmer. Shoot me an email!';
	}

	public function joinHouse($house_id)
	{
		$this->houses()->attach($house_id);

		Activity::createActivitiesUponJoiningHouse($house_id, $this->id);

		return 'Nice pad! Hello programmer. Shoot me an email!';
	}

	public function leaveHouse($house_id)
	{
		$this->houses()->detach($house_id);

		return 'Hope everything turned out alright. Hello programmer. Shoot me an email!';
	}

	public function beginOrEditActivity($activity, $severity)
	{
		if ($activity == 'shower') {
			$this->shower = $severity;
		}

		if ($activity == 'pee') {
			$this->pee = $severity;
		}

		if ($activity == 'poop') {
			$this->poop = $severity;
		}

		$this->save();

		return 'Have fun! Hello programmer. Shoot me an email!';
	}

	public function finishActivity($activity)
	{
		if ($activity == 'shower') {
			$this->shower = 0;
		}

		if ($activity == 'pee') {
			$this->pee = 0;
		}

		if ($activity == 'poop') {
			$this->poop = 0;
		}

		$this->save();

		return 'Have fun! Hello programmer. Shoot me an email!';
	}

	public function houses()
	{
		return $this->belongsToMany('House', 'tenant_house', 'tenant_id', 'house_id')->withTimeStamps();
	}

}
