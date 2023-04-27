<?php

namespace App\Repositories\Interfaces;

use App\Models\Customer;

interface ICustomerRepository
{
  public function existsById(int $id): bool;
  public function existsByGroupId(int $groupId): bool;
  public function existsByCnpj(string $cnpj): bool;
  public function findById(int $id): Customer|null;
  public function create(array $newCustomer): Customer;
  public function delete(int $id): void;
}
