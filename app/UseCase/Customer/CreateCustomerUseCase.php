<?php

namespace App\UseCase\Customer;

use App\Repositories\CustomerRepository;
use App\UseCase\Groups\ExistsGroupByIdUseCase;
use Exception;

class CreateCustomerUseCase
{
    public function __construct(
      private CustomerRepository $repository,
      private ExistsGroupByIdUseCase $existsGroupByIdUseCase,
      private ExistsCustomerByCnpjUseCase $existsCustomerByCnpjUseCase
    ) {}

    public function __invoke(array $customer)
    {
      if (!($this->existsGroupByIdUseCase)($customer["group_id"])) {
        throw new Exception("O grupo preenchido não existe", 404);
      }

      if (($this->existsCustomerByCnpjUseCase)($customer["cnpj"])) {
        throw new Exception("O cnpj preenchido já foi cadastrado", 409);
      }

      return $this->repository->create($customer);
    }
}
