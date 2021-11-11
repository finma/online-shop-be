<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create([
            'name' => 'Firman Maulana',
            'email' => 'maulana@gmail.com',
            'password' => Hash::make('123123'),
            'remember_token' => Str::random(10),
        ]);

        Customer::create([
            'name' => 'Ilham',
            'email' => 'ilham@gmail.com',
            'password' => Hash::make('123456'),
            'remember_token' => Str::random(10),
        ]);
    }
}
