<?php

class BaseController extends Controller {

	protected $currentUser;

	public function __construct(Tenant $currentUser)
	{
		$this->currentUser = Auth::user();
	}

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}

		View::share('currentUser', Auth::user());
		View::share('signedIn', Auth::user());
	}

}
