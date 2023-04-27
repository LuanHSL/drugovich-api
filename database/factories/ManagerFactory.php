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

  public function definition(): array
  {
    return [
      'name' => $this->faker->name,
      'email' => $this->faker->email,
      'password' => Hash::make('password'),
      'level' => $this->faker->randomElement([1, 2]),
    ];
  }

  public function levelOne(): ManagerFactory
  {
    return $this->state([
      'name' => $this->faker->name,
      'email' => 'gerente.level1@hotmail.com',
      'password' => Hash::make('password'),
      'level' => 1,
    ]);
  }

  public function levelTwo(): ManagerFactory
  {
    return $this->state([
      'name' => $this->faker->name,
      'email' => 'gerente.level2@hotmail.com',
      'password' => Hash::make('password'),
      'level' => 2,
    ]);
  }
}
