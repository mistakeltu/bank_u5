<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Jonas',
            'email' => 'jonas@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'user'
        ]);

        DB::table('users')->insert([
            'name' => 'Antanas',
            'email' => 'antanas@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'admin'
        ]);

        DB::table('users')->insert([
            'name' => 'Barsukas',
            'email' => 'barsukas@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'admin'
        ]);

        $faker = Faker::create();


        foreach (range(1, 20) as $index) {
            DB::table('banks')->insert([
                'account_date' => $faker->date(),
                'client_firstname' => $faker->company(),
                'client_lastname' => $faker->company(),
                'client_code' => $faker->numberBetween(10000000000, 99999999999),
                'bank_amount' => 0,
                // 'account_amount' => 0
            ]);
        }

        foreach (range(1, 20) as $index) {
            DB::table('accounts')->insert([
                'bank_id' => $faker->numberBetween(1, 20),
                'account_number' => 'LT' . $faker->numberBetween(100000000000000000, 999999999999999999),
                'account_amount' => 0,
            ]);
        }
    }
}
