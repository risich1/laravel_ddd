<?php

namespace App\Modules\Employee\Domain\Factory;

use App\Modules\Employee\Domain\Department;
use App\Modules\Employee\Domain\Employee;
use App\Modules\Employee\Domain\Specification\EmployeeSpecification;
use App\Modules\Employee\Domain\ValueObject\EmployeeName;
use App\Modules\Employee\Domain\ValueObject\Phone;

class EmployeeFactory
{

    public function __construct(
        private readonly EmployeeSpecification $specification
    ) {}

    public function get(?int $id, EmployeeName $name, Phone $phone, Department $department): Employee {
        return new Employee($id, $name, $phone, $department, $this->specification);
    }

}
