<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ClientsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 700) as $index) {
            $phoneNumber = '09' . $faker->numberBetween(100000000, 999999999);

            DB::table('clients')->insert([
                'firstname' => $faker->firstName,
                'middlename' => $faker->lastName,
                'lastname' => $faker->lastName,
                'birthdate' => $faker->date,
                'clients_number' => $phoneNumber,
                'purok' => $faker->word,
                'barangay' => $faker->city,
                'street' => $faker->streetName,
                'city' => $faker->city,
                'province' => $faker->state,
                'zipcode' => $faker->postcode,
                'gender' => $faker->randomElement(['Male', 'Female']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

}
