<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Fund;
use App\Models\Investment;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CashFlowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $investments = Investment::all();
        foreach ($investments as $investment) {
            $this->createCashFlow($investment);
        }
    }

    private function createCashFlow(Investment $investment)
    {
        $fake = Factory::create();

        $date = $fake->dateTimeBetween($startDate = '-5 years', $endDate = 'now');
        $return = $fake->numberBetween($min = 0, $max = 300);
        DB::table('cash_flows')->insert([
            'id' => Str::uuid(),
            'investment_id' => $investment->id,
            'date' => $date,
            'return' => $return
        ]);
    }
}
