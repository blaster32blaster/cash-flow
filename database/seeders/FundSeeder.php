<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = Factory::create();

        $date = $fake->dateTimeBetween($startDate = '-5 years', $endDate = 'now');
        DB::table('funds')->insert([
            'id' => Str::uuid(),
            'name' => 'Fund 1',
            'type' => 'VC',
            'inception_date' => $date,
            'description' => 'This is first fund'
        ]);

        $date = $fake->dateTimeBetween($startDate = '-5 years', $endDate = 'now');
        DB::table('funds')->insert([
            'id' => Str::uuid(),
            'name' => 'Fund 2',
            'type' => 'RE',
            'inception_date' => $date,
            'description' => 'This is second fund'
        ]);

        $date = $fake->dateTimeBetween($startDate = '-5 years', $endDate = 'now');
        DB::table('funds')->insert([
            'id' => Str::uuid(),
            'name' => 'Fund 3',
            'type' => 'PL',
            'inception_date' => $date,
            'description' => 'This is third fund'
        ]);

        $date = $fake->dateTimeBetween($startDate = '-5 years', $endDate = 'now');
        DB::table('funds')->insert([
            'id' => Str::uuid(),
            'name' => 'Fund 4',
            'type' => 'PC',
            'inception_date' => $date,
            'description' => 'This is fourth fund'
        ]);

        $date = $fake->dateTimeBetween($startDate = '-5 years', $endDate = 'now');
        DB::table('funds')->insert([
            'id' => Str::uuid(),
            'name' => 'Fund 5',
            'type' => 'VC',
            'inception_date' => $date,
            'description' => 'This is fifth fund'
        ]);

        $date = $fake->dateTimeBetween($startDate = '-5 years', $endDate = 'now');
        DB::table('funds')->insert([
            'id' => Str::uuid(),
            'name' => 'Fund 6',
            'type' => 'RE',
            'inception_date' => $date,
            'description' => 'This is sixth fund'
        ]);
    }
}
