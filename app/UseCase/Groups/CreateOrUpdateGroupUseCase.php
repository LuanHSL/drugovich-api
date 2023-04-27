<?php

namespace App\UseCase\Groups;

use App\Models\Group;
use App\Repositories\GroupRepository;
use Exception;

class CreateOrUpdateGroupUseCase
{
    public function __construct(
      private GroupRepository $repository,
      private ExistsGroupByIdUseCase $existsGroupByIdUseCase,
    ) {}

    public function __invoke(array $group): Group
    {
      if (!empty($group["id"]) && !($this->existsGroupByIdUseCase)($group["id"])) {
        throw new Exception("Grupo não encontrado", 404);
      }
      return $this->repository->createOrUpdate($group);
    }
}
