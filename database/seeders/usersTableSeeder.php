<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Gender;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'user_id'=>1,
                'last_name'=>'Çavuşoğlu',
                'first_name'=>'Ege',
                'phone_no'=>'7748 450946',
                'gender_id'=>Gender::MALE,
                'city_id'=>2,
                'user_type_id'=>UserType::RESTAURANT_OWNER,
                'birth_date'=> new Carbon('1999-01-23'),
                'profile_image'=>'avatar.png',
                'is_admin' => false,
                'email'=>'ege5cavusoglu@outlook.com',
                'password'=> bcrypt('asdf1234'),
                'email_verified_at' => null,
                'remember_token'=>null,
                'created_at'=>now(),
                'updated_at'=>null
            ],
            [
                'user_id'=>2,
                'last_name'=>'Güner',
                'first_name'=>'Mustafa',
                'phone_no'=>'533 8673755',
                'gender_id'=>Gender::MALE,
                'city_id'=>1,
                'user_type_id'=>UserType::RESTAURANT_OWNER,
                'birth_date'=> new Carbon('1999-09-28'),
                'profile_image'=>'avatar.png',
                'is_admin' => true,
                'email'=>'mustafa-guner.guner@outlook.com',
                'password'=> bcrypt('asdf1234'),
                'email_verified_at' => null,
                'remember_token'=>null,
                'created_at'=>now(),
                'updated_at'=>null
            ],
            [
                'user_id'=>3,
                'last_name'=>'Daniel',
                'first_name'=>'Jack',
                'phone_no'=>'533 8623755',
                'gender_id'=>Gender::MALE,
                'city_id'=>1,
                'user_type_id'=>UserType::NORMAL_USER,
                'birth_date'=> new Carbon('2001-03-28'),
                'profile_image'=>'avatar.png',
                'is_admin' => false,
                'email'=>'test@outlook.com',
                'password'=> bcrypt('asdf1234'),
                'email_verified_at' => null,
                'remember_token'=>null,
                'created_at'=>now(),
                'updated_at'=>null
            ],
            [
                'user_id'=>4,
                'last_name'=>'Doe',
                'first_name'=>'John',
                'phone_no'=>'533 8624755',
                'gender_id'=>Gender::MALE,
                'city_id'=>1,
                'user_type_id'=>UserType::NORMAL_USER,
                'birth_date'=> new Carbon('1977-03-28'),
                'profile_image'=>'avatar.png',
                'is_admin' => false,
                'email'=>'test2@outlook.com',
                'password'=> bcrypt('asdf1234'),
                'email_verified_at' => null,
                'remember_token'=>null,
                'created_at'=>now(),
                'updated_at'=>null
            ],
            [
                'user_id'=>5,
                'last_name'=>'Doe',
                'first_name'=>'Jane',
                'phone_no'=>'533 8623715',
                'gender_id'=>Gender::FEMALE,
                'city_id'=>3,
                'user_type_id'=>UserType::NORMAL_USER,
                'birth_date'=> new Carbon('1983-03-18'),
                'profile_image'=>'avatar.png',
                'is_admin' => false,
                'email'=>'tes3@outlook.com',
                'password'=> bcrypt('asdf1234'),
                'email_verified_at' => null,
                'remember_token'=>null,
                'created_at'=>now(),
                'updated_at'=>null
            ],
            [
                'user_id'=>6,
                'last_name'=>'Lawrence',
                'first_name'=>'Jennifer',
                'phone_no'=>'533 8623415',
                'gender_id'=>Gender::FEMALE,
                'city_id'=>1,
                'user_type_id'=>UserType::NORMAL_USER,
                'birth_date'=> new Carbon('2001-03-28'),
                'profile_image'=>'avatar.png',
                'is_admin' => false,
                'email'=>'test4@outlook.com',
                'password'=> bcrypt('asdf1234'),
                'email_verified_at' => null,
                'remember_token'=>null,
                'created_at'=>now(),
                'updated_at'=>null
            ],
            [
                'user_id'=>7,
                'last_name'=>'Sally',
                'first_name'=>'Phil',
                'phone_no'=>'513 8123755',
                'gender_id'=>Gender::MALE,
                'city_id'=>1,
                'user_type_id'=>UserType::NORMAL_USER,
                'birth_date'=> new Carbon('1999-02-28'),
                'profile_image'=>'avatar.png',
                'is_admin' => false,
                'email'=>'test5@outlook.com',
                'password'=> bcrypt('asdf1234'),
                'email_verified_at' => null,
                'remember_token'=>null,
                'created_at'=>now(),
                'updated_at'=>null
            ],
            [
                'user_id'=>8,
                'last_name'=>'Gunes',
                'first_name'=>'Zeynep',
                'phone_no'=>'523 8621795',
                'gender_id'=>Gender::MALE,
                'city_id'=>1,
                'user_type_id'=>UserType::NORMAL_USER,
                'birth_date'=> new Carbon('2001-03-28'),
                'profile_image'=>'avatar.png',
                'is_admin' => false,
                'email'=>'tes6@outlook.com',
                'password'=> bcrypt('asdf1234'),
                'email_verified_at' => null,
                'remember_token'=>null,
                'created_at'=>now(),
                'updated_at'=>null
            ],
            [
                'user_id'=>9,
                'last_name'=>'Zurnaci',
                'first_name'=>'Mehmer',
                'phone_no'=>'531 8513755',
                'gender_id'=>Gender::MALE,
                'city_id'=>2,
                'user_type_id'=>UserType::NORMAL_USER,
                'birth_date'=> new Carbon('1998-03-28'),
                'profile_image'=>'avatar.png',
                'is_admin' => false,
                'email'=>'test7@outlook.com',
                'password'=> bcrypt('asdf1234'),
                'email_verified_at' => null,
                'remember_token'=>null,
                'created_at'=>now(),
                'updated_at'=>null
            ],
            [
                'user_id'=>10,
                'last_name'=>'Bill',
                'first_name'=>'William',
                'phone_no'=>'532 8620055',
                'gender_id'=>Gender::MALE,
                'city_id'=>3,
                'user_type_id'=>UserType::NORMAL_USER,
                'birth_date'=> new Carbon('2001-11-28'),
                'profile_image'=>'avatar.png',
                'is_admin' => false,
                'email'=>'test8@outlook.com',
                'password'=> bcrypt('asdf1234'),
                'email_verified_at' => null,
                'remember_token'=>null,
                'created_at'=>now(),
                'updated_at'=>null
            ],
            [
                'user_id'=>11,
                'last_name'=>'Poe',
                'first_name'=>'Downie',
                'phone_no'=>'548 8623755',
                'gender_id'=>Gender::FEMALE,
                'city_id'=>1,
                'user_type_id'=>UserType::NORMAL_USER,
                'birth_date'=> new Carbon('2001-7-20'),
                'profile_image'=>'avatar.png',
                'is_admin' => false,
                'email'=>'test9@outlook.com',
                'password'=> bcrypt('asdf1234'),
                'email_verified_at' => null,
                'remember_token'=>null,
                'created_at'=>now(),
                'updated_at'=>null
            ],
            [
                'user_id'=>12,
                'last_name'=>'Evlat',
                'first_name'=>'Akil',
                'phone_no'=>'533 8113155',
                'gender_id'=>Gender::MALE,
                'city_id'=>1,
                'user_type_id'=>UserType::NORMAL_USER,
                'birth_date'=> new Carbon('1999-04-15'),
                'profile_image'=>'avatar.png',
                'is_admin' => false,
                'email'=>'tes10t@outlook.com',
                'password'=> bcrypt('asdf1234'),
                'email_verified_at' => null,
                'remember_token'=>null,
                'created_at'=>now(),
                'updated_at'=>null
            ]
        ];

        User::insert($users);
    }
}
