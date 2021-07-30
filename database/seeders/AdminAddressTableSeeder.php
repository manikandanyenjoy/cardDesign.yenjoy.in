<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminAddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $address = [
            [
                "admin_id" => "1",
                "fullname" => "Manikandan s",
                "flatno" => "#34",
                "apartment" => "Mk apaetment",
                "landmark" => "Near Cell shop",
                "area" => "Anna Nagar",
                "zipcode" => "600012",
                "city" => "Chennai",
                "country" => "India",
                "state" => "TamilNadu",

            ],
            [
                "admin_id" => "1",
                "fullname" => "Manikandan s",
                "flatno" => "#34",
                "apartment" => "Mk apaetment",
                "landmark" => "Near Cell shop",
                "area" => "Anna Nagar",
                "zipcode" => "600012",
                "city" => "Chennai",
                "country" => "India",
                "state" => "TamilNadu",

            ],
        ];

        foreach ($address as $user) {
            admin_addresses::create($user);
        }
    }
    }
}
