<?php

namespace App\UseCase\Groups;

use App\Repositories\GroupRepository;

class GetAllGroupUseCase
{
    public function __construct(
      private GroupRepository $repository
    ) {}

    public function __invoke()
    {
      return $this->repository->all();
    }
}
