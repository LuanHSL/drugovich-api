<?php

namespace App\Actions\Group;

use App\Http\Controllers\Controller;
use App\UseCase\Groups\GetAllGroupUseCase;
use Exception;
use Illuminate\Http\JsonResponse;

class GetAllGroupAction extends Controller
{
    public function __construct(
        private GetAllGroupUseCase $getAllGroupUseCase
    ) {}

    public function __invoke(): JsonResponse
    {

        try {
            return response()->json(($this->getAllGroupUseCase)());
        } catch (Exception $e) {
            return response()->json(["messages" => $e->getMessage()], $e->getCode());
        }
    }
}
