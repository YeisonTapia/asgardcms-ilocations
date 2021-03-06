<?php

namespace Modules\Ilocations\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\Ilocations\Entities\City;

class CityTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Model::unguard();
    
    DB::table('ilocations__cities')->delete();
    $path = public_path('/modules/ilocations/js/citiesCO.json');
    $cities = json_decode(file_get_contents($path), true);
 
    foreach ($cities as $key => $city)
      City::create($city);
  }
}
