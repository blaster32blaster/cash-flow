<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // check for table existence
        if (!Schema::hasTable('clients')) {
            return;
        }

        $clients = Client::all();
        // ensure were working with a fresh table
        if ($clients->count() > 0) {
            return;
        }

        DB::table('clients')->insert([
            'id' => Str::uuid(),
            'name' => 'Client 1',
            'permission' => json_encode([
                'VC',
                'RE',
                'PL',
                'PC'
            ]),
            'description' => 'This is Client 1'
        ]);

        DB::table('clients')->insert([
            'id' => Str::uuid(),
            'name' => 'Client 2',
            'permission' => json_encode([
                'VC',
                'RE'
            ]),
            'description' => 'This is Client 2'
        ]);

        DB::table('clients')->insert([
            'id' => Str::uuid(),
            'name' => 'Client 3',
            'permission' => json_encode([
                'PL',
                'PC'
            ]),
            'description' => 'This is Client 3'
        ]);
    }
}
