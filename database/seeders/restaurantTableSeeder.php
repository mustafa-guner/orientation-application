<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class restaurantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurants = [
            [
                'restaurant_id'=>1,
                'name'=>'Chinese House Kyrenia',
                'description'=>'Chinese House offers a fine dining experience with its professional service, comfortable atmosphere and a menu created in respect to tradition and craft for reasonable prices.',
                'profile_image'=>'restaurant.jpg',
                'email'=>'info@chinesehousecyprus.net',
                'address'=>'Naci Talat Caddesi, No:20 | Karaoğlanoğlu | Kyrenia | North Cyprus',
                'phone_no'=>'+90 (392) 815 2130',
                'phone_no_2'=>'+90 (542) 851 4080',
                'has_outdoor'=>true,
                'has_indoor'=>true,
                'is_available'=>true,
                'city_id'=>2,
                'owner_id'=>1,
                'is_open'=>true,
                'facebook_link'=>'https://www.facebook.com/ChineseHouseCyprus?fref=ts',
                'instagram_link'=>null,
                'website_link'=>'https://chinesehousecyprus.net/',
                'created_at'=>now(),
                'updated_at'=>null
            ]
        ];
        Restaurant::insert($restaurants);
    }
}
