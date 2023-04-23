<?php

namespace Database\Seeders;

use App\Models\City;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class cityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $cities = [
            [
              'city_id'=>1,
              'name'=>'Famagusta',
              'created_at'=>Carbon::now()
            ],
            [
                'city_id'=>2,
                'name'=>'Kyrenia',
                'created_at'=>Carbon::now()
            ],
            [
                'city_id'=>3,
                'name'=>'Limassol',
                'created_at'=>Carbon::now()
            ],
            [
                'city_id'=>4,
                'name'=>'Larnaca',
                'created_at'=>Carbon::now()
            ],
            [
                'city_id'=>5,
                'name'=>'Nicosia',
                'created_at'=>Carbon::now()
            ],
            [
                'city_id'=>6,
                'name'=>'Paphos',
                'created_at'=>Carbon::now()
            ],
        ];

        City::insert($cities);
    }
}
