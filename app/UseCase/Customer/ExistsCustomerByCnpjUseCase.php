<?php

namespace App\UseCase\Customer;

use App\Repositories\CustomerRepository;

class ExistsCustomerByCnpjUseCase
{
    public function __construct(
      private CustomerRepository $repository
    ) {}

    public function __invoke(string $cnpj)
    {
      return $this->repository->existsByCnpj($cnpj);
    }
}
