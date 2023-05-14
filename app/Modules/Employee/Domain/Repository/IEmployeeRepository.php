<?php

namespace App\Modules\Employee\Domain\Repository;

use App\Modules\Employee\Domain\Employee;
use App\Modules\Employee\Domain\ValueObject\EmployeeName;
use App\Modules\Employee\Domain\ValueObject\Phone;

interface IEmployeeRepository
{
    public function getByPhone(Phone $phone): ?Employee;
    public function getById(int $id): ?Employee;
    public function getByName(EmployeeName $name): ?Employee;
}
