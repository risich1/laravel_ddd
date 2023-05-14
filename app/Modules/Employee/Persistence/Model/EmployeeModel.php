<?php

namespace App\Modules\Employee\Persistence\Model;

use App\Modules\Employee\Domain\Department;
use App\Modules\Employee\Domain\Employee;
use App\Modules\Employee\Domain\Specification\EmployeeSpecification;
use App\Modules\Employee\Domain\ValueObject\EmployeeName;
use App\Modules\Employee\Domain\ValueObject\Phone;
use App\Modules\Employee\Persistence\Entity\EmployeePersistence;
use App\Modules\Employee\Persistence\Repository\DepartmentRepository;

class EmployeeModel
{

    public function __construct(private readonly DepartmentRepository $departmentRepository, private readonly  DepartmentModel $departmentModel) {}

    public function fromDomain(Employee $employee): EmployeePersistence {
        return new EmployeePersistence(
            $employee->getId(),
            $employee->getName(),
            $employee->getPhone(),
            $employee->getDepartment()->getId()
        );
    }

    public function toDomain(EmployeePersistence $persistence): Employee {
        $department = $this->departmentRepository->getById($persistence->getDepartmentId());

        return new Employee(
            $persistence->getId(),
            new EmployeeName($persistence->getName()),
            new Phone($persistence->getPhone()),
            $this->departmentModel->toDomain($department),
            new EmployeeSpecification()
        );
    }

}
