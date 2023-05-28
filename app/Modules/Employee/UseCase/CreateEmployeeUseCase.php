<?php

namespace App\Modules\Employee\UseCase;

use App\Modules\Employee\Domain\DTO\CreateEmployeeDTO;
use App\Modules\Employee\Domain\Factory\EmployeeFactory;
use App\Modules\Employee\Domain\ValueObject\EmployeeName;
use App\Modules\Employee\Domain\ValueObject\Phone;
use App\Modules\Employee\Persistence\Action\CreateEmployee;
use App\Modules\Employee\Persistence\Action\GetDepartmentById;

class CreateEmployeeUseCase
{

    public function __construct(
        private readonly CreateEmployee $createEmployee,
        private readonly EmployeeFactory $employeeFactory,
        private readonly GetDepartmentById $getDepartmentById
    ) {}

    public function create(CreateEmployeeDTO $data): void {
        $employee = $this->employeeFactory->get(
            null,
            new EmployeeName($data->getSurname(), $data->getName(), $data->getPatronymic()),
            new Phone($data->getPhone()),
            $this->getDepartmentById->handle($data->getDepartment())
        );

        $this->createEmployee->handle($employee);
    }

}
