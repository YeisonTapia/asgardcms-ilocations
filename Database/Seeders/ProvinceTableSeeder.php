<?php

namespace Modules\Ilocations\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\Ilocations\Entities\Province;
use Modules\Ilocations\Entities\Country;

class ProvinceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('ilocations__provinces')->delete();
        $path = public_path('/modules/ilocations/js/provinces.json');
        $provinces = json_decode(file_get_contents($path), true);
        $countries = Country::all();

        foreach ($countries as $key => $country) 
            foreach ($provinces as $key => $province)
                if($country->iso_2 == $province['country'])
                    Province::create([
                        'name' => $province['region'],
                        'iso_2' => $province['iso_2'],
                        'country_id' => $country->id
                    ]);

    }
}
