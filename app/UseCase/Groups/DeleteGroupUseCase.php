<?php

namespace App\UseCase\Groups;

use App\Repositories\GroupRepository;
use App\UseCase\Customer\ExistsCustomerByGroupIdUseCase;
use Exception;

class DeleteGroupUseCase
{
    public function __construct(
      private GroupRepository $repository,
      private GetGroupByIdUseCase $getGroupByIdUseCase,
      private ExistsCustomerByGroupIdUseCase $existsCustomerByGroupIdUseCase,
    ) {}

    public function __invoke(int $id): void
    {
      $group = ($this->getGroupByIdUseCase)($id);

      if (empty($group)) {
        throw new Exception("Grupo não encontrado", 404);
      }

      if (($this->existsCustomerByGroupIdUseCase)($id)) {
        throw new Exception("Não pode deletar esse grupo, pois existem clientes com esse grupo selecionado", 404);
      }

      $this->repository->delete($id);
    }
}
