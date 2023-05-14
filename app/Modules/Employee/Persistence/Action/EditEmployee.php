<?php

namespace App\Modules\Employee\Persistence\Action;

use App\Modules\Employee\Domain\Actions\IEditEmployee;
use App\Modules\Employee\Domain\Employee;
use App\Modules\Employee\Persistence\Model\EmployeeModel;
use App\Modules\Employee\Persistence\Repository\EmployeeRepository;

class EditEmployee implements IEditEmployee
{

    public function __construct(
        private readonly EmployeeModel $employeeModel,
        private readonly EmployeeRepository $employeeRepository
    ) {}

    public function handle(Employee $employee): void {
        $this->employeeRepository->update(
            $this->employeeModel->fromDomain($employee)
        );
    }

}
