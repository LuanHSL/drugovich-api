<?php

namespace App\Actions\Group;

use App\Http\Controllers\Controller;
use App\UseCase\Groups\CreateOrUpdateGroupUseCase;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CreateGroupAction extends Controller
{
    public function __construct(
        private CreateOrUpdateGroupUseCase $createOrUpdateGroupUseCase,
    ) {}

    public function __invoke(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'name' => 'required|string',
            ]);
        } catch (Exception $e) {
            return response()->json(["messages" => $e->getMessage()], $e->getCode());
        }

        return response()->json(($this->createOrUpdateGroupUseCase)(["name" => $request->name]));
    }
}
