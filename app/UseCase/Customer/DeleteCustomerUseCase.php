<?php

namespace App\UseCase\Customer;

use App\Repositories\CustomerRepository;
use Exception;

class DeleteCustomerUseCase
{
    public function __construct(
      private CustomerRepository $repository,
      private ExistsCustomerByIdUseCase $existsCustomerByIdUseCase
    ) {}

    public function __invoke(int $id)
    {
      if (!($this->existsCustomerByIdUseCase)($id)) {
        throw new Exception("O cliente não existe", 404);
      }

      return $this->repository->delete($id);
    }
}
