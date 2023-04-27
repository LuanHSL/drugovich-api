<?php

namespace App\Actions\Customer;

use App\Http\Controllers\Controller;
use App\UseCase\Customer\CreateCustomerUseCase;
use App\UseCase\Customer\DeleteCustomerUseCase;
use Exception;
use Illuminate\Http\JsonResponse;

class DeleteCustomerAction extends Controller
{
    public function __construct(
        private DeleteCustomerUseCase $deleteCustomerUseCase,
    ) {}

    public function __invoke(int $id): JsonResponse
    {
        try {
            ($this->deleteCustomerUseCase)($id);
            return response()->json(["messages" => "cliente deletado com sucesso"]);
        } catch (Exception $e) {
            return response()->json(["messages" => $e->getMessage()], $e->getCode());
        }
    }
}
