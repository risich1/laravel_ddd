<?php

namespace App\Modules\Employee\Persistence\Action;

use App\Modules\Employee\Domain\Actions\ICreateDepartment;
use App\Modules\Employee\Domain\Department;
use App\Modules\Employee\Persistence\Model\DepartmentModel;
use App\Modules\Employee\Persistence\Repository\DepartmentRepository;

class CreateDepartment implements ICreateDepartment {

    public function __construct(
        private readonly DepartmentModel $departmentModel,
        private readonly DepartmentRepository $departmentRepository
    ) {}

    public function handle(Department $department): int|string {
        return $this->departmentRepository->insert(
            $this->departmentModel->fromDomain($department)
        );
    }

}
