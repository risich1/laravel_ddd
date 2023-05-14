<?php

namespace App\Modules\Employee\Persistence\Action;

use App\Modules\Employee\Domain\Actions\ICreateEmployee;
use App\Modules\Employee\Domain\Employee;
use App\Modules\Employee\Persistence\Model\EmployeeModel;
use App\Modules\Employee\Persistence\Repository\EmployeeRepository;

class CreateEmployee implements ICreateEmployee {

    public function __construct(
        private readonly EmployeeModel $employeeModel,
        private readonly EmployeeRepository $employeeRepository
    ) {}

    public function handle(Employee $employee): void {
        $this->employeeRepository->insert(
            $this->employeeModel->fromDomain($employee)
        );
    }

}
