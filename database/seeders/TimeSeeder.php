<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('times')->insert([
            ['time' => 30],
            ['time' => 45],
           ['time' => 60],
           ['time' => 75],
           ['time' => 90],
           ['time' => 105],
           ['time' => 120],
           ['time' => 135],
           ['time' => 155],
           ]);
    }
}
