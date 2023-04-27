<?php

namespace App\UseCase\Customer;

use App\Repositories\CustomerRepository;

class ExistsCustomerByIdUseCase
{
    public function __construct(
      private CustomerRepository $repository
    ) {}

    public function __invoke(string $id)
    {
      return $this->repository->existsById($id);
    }
}
