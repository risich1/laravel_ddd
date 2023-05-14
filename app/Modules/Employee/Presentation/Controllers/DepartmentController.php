<?php

namespace App\Modules\Employee\Presentation\Controllers;

use App\Modules\Employee\Domain\DTO\CreateDepartmentDTO;
use App\Modules\Employee\Presentation\Requests\CreateDepartmentRequest;
use App\Modules\Employee\UseCase\CreateDepartmentUseCase;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;


class DepartmentController extends BaseController
{
    public function __construct(
       private readonly CreateDepartmentUseCase $createDepartmentUseCase
    ) {}

    public function create(CreateDepartmentRequest $request): JsonResponse {
        $data = $request->validated();
        $this->createDepartmentUseCase->create(new CreateDepartmentDTO(
            $data['name'], $data['parent_id'] ?? null
        ));

        return response()->json([
            'status' => 'ok'
        ]);
    }

    public function update(int $id): JsonResponse {
        return response()->json([
            'status' => 'ok'
        ]);
    }

    public function delete(int $id): JsonResponse {

        return response()->json([
            'status' => 'ok'
        ]);

    }

}
