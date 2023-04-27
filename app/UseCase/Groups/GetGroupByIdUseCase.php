<?php

namespace App\UseCase\Groups;

use App\Models\Group;
use App\Repositories\GroupRepository;

class GetGroupByIdUseCase
{
    public function __construct(
      private GroupRepository $repository
    ) {}

    public function __invoke(int $id): Group|null
    {
      return $this->repository->findById($id);
    }
}
