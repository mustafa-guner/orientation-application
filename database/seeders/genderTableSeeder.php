<?php

namespace Database\Seeders;

use App\Models\Gender;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class genderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gender = [
            ['gender_id' =>1,'name'=>'Male','created_at'=>Carbon::now()],
            ['gender_id'=>2,'name'=>'Female','created_at'=>Carbon::now()],
            ['gender_id'=>3,'name'=>'Other','created_at'=>Carbon::now()]
        ];
         Gender::insert($gender);
    }
}
