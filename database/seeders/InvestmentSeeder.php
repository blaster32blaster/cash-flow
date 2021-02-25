<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Fund;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class InvestmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $fake = Factory::create();

        $client = Client::inRandomOrder()
            ->get()
            ->first();

        $fund = Fund::inRandomOrder()
            ->whereIn('type', json_decode($client->permission, TRUE))
            ->get()
            ->first();

        $date = $fake->dateTimeBetween($startDate = '-5 years', $endDate = 'now');
        $amount = $fake->numberBetween($min = 1000, $max = 1000000);
        DB::table('investments')->insert([
            'id' => Str::uuid(),
            'name' => 'Investment 1',
            'client_id' => $client->id,
            'fund_id' => $fund->id,
            'date' => $date,
            'amount' => $amount
        ]);

        $client = Client::inRandomOrder()
            ->get()
            ->first();

        $fund = Fund::inRandomOrder()
            ->whereIn('type', json_decode($client->permission, TRUE))
            ->get()
            ->first();

        $date = $fake->dateTimeBetween($startDate = '-5 years', $endDate = 'now');
        $amount = $fake->numberBetween($min = 1000, $max = 1000000);
        DB::table('investments')->insert([
            'id' => Str::uuid(),
            'name' => 'Investment 2',
            'client_id' => $client->id,
            'fund_id' => $fund->id,
            'date' => $date,
            'amount' => $amount
        ]);

        $client = Client::inRandomOrder()
            ->get()
            ->first();

        $fund = Fund::inRandomOrder()
            ->whereIn('type', json_decode($client->permission, TRUE))
            ->get()
            ->first();

        $date = $fake->dateTimeBetween($startDate = '-5 years', $endDate = 'now');
        $amount = $fake->numberBetween($min = 1000, $max = 1000000);
        DB::table('investments')->insert([
            'id' => Str::uuid(),
            'name' => 'Investment 3',
            'client_id' => $client->id,
            'fund_id' => $fund->id,
            'date' => $date,
            'amount' => $amount
        ]);

        $client = Client::inRandomOrder()
            ->get()
            ->first();

        $fund = Fund::inRandomOrder()
            ->whereIn('type', json_decode($client->permission, TRUE))
            ->get()
            ->first();

        $date = $fake->dateTimeBetween($startDate = '-5 years', $endDate = 'now');
        $amount = $fake->numberBetween($min = 1000, $max = 1000000);
        DB::table('investments')->insert([
            'id' => Str::uuid(),
            'name' => 'Investment 4',
            'client_id' => $client->id,
            'fund_id' => $fund->id,
            'date' => $date,
            'amount' => $amount
        ]);

        $client = Client::inRandomOrder()
            ->get()
            ->first();

        $fund = Fund::inRandomOrder()
            ->whereIn('type', json_decode($client->permission, TRUE))
            ->get()
            ->first();

        $date = $fake->dateTimeBetween($startDate = '-5 years', $endDate = 'now');
        $amount = $fake->numberBetween($min = 1000, $max = 1000000);
        DB::table('investments')->insert([
            'id' => Str::uuid(),
            'name' => 'Investment 5',
            'client_id' => $client->id,
            'fund_id' => $fund->id,
            'date' => $date,
            'amount' => $amount
        ]);

        $client = Client::inRandomOrder()
            ->get()
            ->first();

        $fund = Fund::inRandomOrder()
            ->whereIn('type', json_decode($client->permission, TRUE))
            ->get()
            ->first();

        $date = $fake->dateTimeBetween($startDate = '-5 years', $endDate = 'now');
        $amount = $fake->numberBetween($min = 1000, $max = 1000000);
        DB::table('investments')->insert([
            'id' => Str::uuid(),
            'name' => 'Investment 6',
            'client_id' => $client->id,
            'fund_id' => $fund->id,
            'date' => $date,
            'amount' => $amount
        ]);

        $client = Client::inRandomOrder()
            ->get()
            ->first();

        $fund = Fund::inRandomOrder()
            ->whereIn('type', json_decode($client->permission, TRUE))
            ->get()
            ->first();

        $date = $fake->dateTimeBetween($startDate = '-5 years', $endDate = 'now');
        $amount = $fake->numberBetween($min = 1000, $max = 1000000);
        DB::table('investments')->insert([
            'id' => Str::uuid(),
            'name' => 'Investment 7',
            'client_id' => $client->id,
            'fund_id' => $fund->id,
            'date' => $date,
            'amount' => $amount
        ]);
    }
}
