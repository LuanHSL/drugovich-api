<?php

namespace App\Actions\Group;

use App\Http\Controllers\Controller;
use App\UseCase\Groups\CreateOrUpdateGroupUseCase;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UpdateGroupAction extends Controller
{
    public function __construct(
        private CreateOrUpdateGroupUseCase $createOrUpdateGroupUseCase,
    ) {}

    public function __invoke(Request $request): JsonResponse
    {

        try {
            $request->validate([
                'id' => 'required|integer',
                'name' => 'required|string',
            ]);

            return response()->json(($this->createOrUpdateGroupUseCase)([
                "id" => $request->id,
                "name" => $request->name,
            ]));
        } catch (Exception $e) {
            return response()->json(["messages" => $e->getMessage()], $e->getCode());
        }
    }
}
