<?php

namespace App\Actions\Group;

use App\Http\Controllers\Controller;
use App\UseCase\Groups\DeleteGroupUseCase;
use Exception;
use Illuminate\Http\JsonResponse;

class DeleteGroupAction extends Controller
{
    public function __construct(
        private DeleteGroupUseCase $deleteGroupUseCase,
    ) {}

    public function __invoke(int $id): JsonResponse
    {
        try {
            ($this->deleteGroupUseCase)($id);
            return response()->json(["messages" => "grupo deletado com sucesso"]);
        } catch (Exception $e) {
            return response()->json(["messages" => $e->getMessage()], $e->getCode());
        }
    }
}
