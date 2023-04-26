<?php

namespace Database\Seeders;

use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class statusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
          [
              "status_id"=>1,
              "title"=>"Pending",
              "created_at"=>Carbon::now()
          ],
          [
              "status_id"=>2,
              "title"=>'Confirmed',
              "created_at"=>Carbon::now()
          ],
          [
              "status_id"=>3,
              "title"=>'Rejected',
              "created_at"=>Carbon::now()
          ]
        ];

        Status::insert($statuses);
    }
}
