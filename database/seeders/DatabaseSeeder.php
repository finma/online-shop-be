<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
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

    Product::factory(5)->create();
  }
}
