<?php

namespace App\Repositories;

use App\Models\Customer;
use App\Repositories\Interfaces\ICustomerRepository;

class CustomerRepository implements ICustomerRepository
{

  public function existsById(int $id): bool
  {
    return Customer::where('id', $id)->exists();
  }

  public function existsByGroupId(int $groupId): bool
  {
    return Customer::where('group_id', $groupId)->exists();
  }

  public function existsByCnpj(string $cnpj): bool
  {
    return Customer::where('cnpj', $cnpj)->exists();
  }

  public function findById(int $id): Customer|null
  {
    return Customer::where('id', $id)->first();
  }

  public function create(array $newCustomer): Customer
  {
    return Customer::create($newCustomer);
  }

  public function delete(int $id): void
  {
    $customer = $this->findById($id);
    $customer->delete();
  }
}
