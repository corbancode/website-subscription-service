<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = DB::table('websites')->count();
        if($count === 0) {
            $websites = json_decode(file_get_contents(__DIR__ . '/data/websites.json'), true);

            DB::table('websites')->insert($websites);
        }
    }
}
