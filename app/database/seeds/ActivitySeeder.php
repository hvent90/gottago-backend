<?php

class ActivitySeeder extends Seeder {

	protected $activity;

	public function __construct(Activity $activity)
	{
		$this->activity = $activity;
	}

    public function run()
    {
        DB::table('activities')->delete();

        $activities = [
            'Shower',
            'Pee',
            'Poop'
        ];

        foreach ($activities as $activity) {
            Activity::createActivity($activity);
        }
    }

}