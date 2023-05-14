<?php

namespace App\Modules\Employee\Domain\Specification;

use App\Modules\Employee\Domain\Actions\IGetEmployeeByPhone;
use App\Modules\Employee\Domain\Employee;
use Mockery\Exception;

class EmployeePhoneSpecification
{
    public function __construct(private IGetEmployeeByPhone $employeeByPhone) {}

    public function satisfy(Employee $employee) {
        $existingEmployee = $this->employeeByPhone->handle($employee->getPhone());

        if ($existingEmployee) {
            throw new Exception('Employee with the phone already exists');
        }
    }
}
