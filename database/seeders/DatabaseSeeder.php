<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {

    User::create([
      'name' => 'Firman Maulana',
      'username' => 'finma',
      'email' => 'firman@gmail.com',
      'password' => bcrypt('123123')
    ]);

    User::factory(4)->create();

    Category::create([
      'name' => 'baju',
      'slug' => 'baju'
    ]);

    Category::create([
      'name' => 'celana',
      'slug' => 'celana'
    ]);

    Category::create([
      'name' => 'sepatu',
      'slug' => 'sepatu'
    ]);

    Payment::create([
      'name' => 'Firman Maulana',
      'bank_name' => 'BRI',
      'no_rekening' => '432178935728',
      'slug' => '432178935728',
      'type' => 'Tranfer'
    ]);

    Payment::create([
      'name' => 'Salman',
      'bank_name' => 'Mandiri',
      'no_rekening' => '432163895728',
      'slug' => '432163895728',
      'type' => 'Tranfer'
    ]);

    Product::factory(30)->create();

    Transaction::factory(5)->create();
  }
}
