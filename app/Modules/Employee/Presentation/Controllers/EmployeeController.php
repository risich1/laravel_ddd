<?php

namespace App\Modules\Employee\Presentation\Controllers;

use App\Modules\Employee\Domain\DTO\CreateEmployeeDTO;
use App\Modules\Employee\Presentation\Requests\CreateEmployeeRequest;
use App\Modules\Employee\UseCase\CreateEmployeeUseCase;
use App\Modules\Employee\UseCase\DeleteEmployeeUseCase;
use App\Modules\Employee\UseCase\EditEmployeeUseCase;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __construct(
      private readonly CreateEmployeeUseCase $createEmployeeUseCase,
//      private readonly EditEmployeeUseCase $editEmployeeUseCase,
//      private readonly DeleteEmployeeUseCase $deleteEmployeeUseCase
    ) {}

    public function create(CreateEmployeeRequest $request): JsonResponse {
        $data = $request->validated();
        $dto = new CreateEmployeeDTO(
            $data['name'],
            $data['phone'],
            $data['department_id']
        );

        $this->createEmployeeUseCase->create($dto);

        return response()->json([
           'status' => 'ok'
        ]);
    }

    public function update(Request $request, int $id): JsonResponse {
        return response()->json([
            'status' => 'ok'
        ]);
    }

    public function delete(Request $request, int $id): JsonResponse {
        return response()->json([
            'status' => 'ok'
        ]);
    }

}
