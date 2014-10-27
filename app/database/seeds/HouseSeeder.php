<?php

class HouseSeeder extends Seeder {

	protected $house;

	public function __construct(House $house)
	{
		$this->house = $house;
	}

    public function run()
    {
        DB::table('houses')->delete();

        $houses = [
            '18 West Barnard',
            'Hell'
        ];

        foreach ($houses as $house) {
            House::createHouse($house);
        }
    }

}