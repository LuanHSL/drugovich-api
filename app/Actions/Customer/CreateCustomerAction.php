<?php

namespace App\Actions\Customer;

use App\Http\Controllers\Controller;
use App\UseCase\Customer\CreateCustomerUseCase;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CreateCustomerAction extends Controller
{
    public function __construct(
        private CreateCustomerUseCase $createCustomerUseCase,
    ) {}

    public function __invoke(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'cnpj' => 'required|string',
                'foundation_date' => 'required|string',
                'group_id' => 'required|integer',
            ]);

            return response()->json(($this->createCustomerUseCase)($request->toArray()));

        } catch (Exception $e) {
            return response()->json(["messages" => $e->getMessage()], $e->getCode());
        }
    }
}
