<?php

namespace App\UseCase\Customer;

use App\Repositories\CustomerRepository;

class ExistsCustomerByGroupIdUseCase
{
    public function __construct(
      private CustomerRepository $repository
    ) {}

    public function __invoke(int $groupId)
    {
      return $this->repository->existsByGroupId($groupId);
    }
}
