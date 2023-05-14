<?php

namespace App\Modules\Employee\Persistence\Action;

use App\Modules\Employee\Domain\Actions\IGetDepartmentById;
use App\Modules\Employee\Domain\Department;
use App\Modules\Employee\Persistence\Model\DepartmentModel;
use App\Modules\Employee\Persistence\Repository\DepartmentRepository;

class GetDepartmentById implements IGetDepartmentById
{
    public function __construct(
        private readonly DepartmentModel $departmentModel,
        private readonly DepartmentRepository $departmentRepository
    ) {}

    public function handle(int $id): ?Department {
        $entity = $this->departmentRepository->getById($id);
        return $entity ? $this->departmentModel->toDomain($entity) : null;
    }

}
