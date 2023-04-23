<?php

namespace Database\Seeders;

use App\Models\UserType;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class userTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userTypes = [
            ['user_type_id'=>1,'title'=>'Normal User','created_at'=>Carbon::now()],
            ['user_type_id'=>2,'title'=>'Restaurant Owner','created_at'=>Carbon::now()],
        ];

        UserType::insert($userTypes);
    }
}
