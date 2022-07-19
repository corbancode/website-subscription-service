<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = DB::table('users')->count();
        if($count === 0) {
            $users = json_decode(file_get_contents(__DIR__ . '/data/users.json'), true);

            DB::table('users')->insert($users);
        }
    }
}
