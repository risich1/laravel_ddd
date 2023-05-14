<?php

namespace App\Modules\Employee\Persistence\Action;

use App\Modules\Employee\Domain\Actions\IGetEmployeeByPhone;
use App\Modules\Employee\Domain\Employee;
use App\Modules\Employee\Persistence\Model\EmployeeModel;
use App\Modules\Employee\Persistence\Repository\EmployeeRepository;

class GetEmployeeById implements IGetEmployeeByPhone
{
    public function __construct(
        private readonly EmployeeModel $employeeModel,
        private readonly EmployeeRepository $employeeRepository
    ) {}

    public function get(int $id): ?Employee {
        $entity = $this->employeeRepository->getById($id);

        return $entity ? $this->employeeModel->toDomain($entity) : null;
    }
}
