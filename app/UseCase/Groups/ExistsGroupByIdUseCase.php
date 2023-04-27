<?php

namespace App\UseCase\Groups;

use App\Repositories\GroupRepository;

class ExistsGroupByIdUseCase
{
    public function __construct(
      private GroupRepository $repository
    ) {}

    public function __invoke(int $id)
    {
      return $this->repository->existsById($id);
    }
}
