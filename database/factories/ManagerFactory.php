<?php

namespace Database\Factories;

use App\Models\Manager;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Manager>
 */
class ManagerFactory extends Factory
{
  protected $model = Manager::class;

  public function definition()
  {
    return [
      'name' => $this->faker->name,
      'email' => $this->faker->email,
      'password' => Hash::make('123'),
      'level' => $this->faker->randomElement([1, 2]),
    ];
  }
}
