<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CustomerFactory extends Factory
{
  protected $model = Customer::class;

  public function definition()
  {
    return [
      'cnpj' => $this->faker->numerify('##.###.###/####-##'),
      'name' => $this->faker->name,
      'foundation_date' => $this->faker->date('Y-m-d'),
      'group_id' => Group::inRandomOrder()->first()->id,
    ];
  }
}
