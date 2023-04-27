<?php

namespace Database\Seeders;

use App\Models\Manager;
use Illuminate\Database\Seeder;

class ManagerSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Manager::factory()->levelOne()->create();
    Manager::factory()->levelTwo()->create();
    Manager::factory()->count(8)->create();
  }
}
