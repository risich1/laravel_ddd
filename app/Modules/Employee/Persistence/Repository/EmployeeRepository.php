<?php

namespace App\Modules\Employee\Persistence\Repository;

use App\Modules\Employee\Persistence\EmployeeEloquent;
use App\Modules\Employee\Persistence\Entity\EmployeePersistence;
use Illuminate\Database\Eloquent\Collection;

class EmployeeRepository
{
    public function insert(EmployeePersistence $employee): void {
        $eloquent = new EmployeeEloquent([
            'name' => $employee->getName(),
            'phone' => $employee->getPhone(),
            'parent_id' => $employee->getDepartmentId()
        ]);
        $eloquent->save();
    }

    public function update(EmployeePersistence $employee): void {
        EmployeeEloquent::query()->find($employee->getId())->update([
            'name' => $employee->getName(),
            'phone' => $employee->getPhone(),
            'parent_id' => $employee->getDepartmentId()
        ]);
    }

    public function delete(EmployeePersistence $employee): void {
        EmployeeEloquent::query()->find($employee->getId())->delete();
    }

    public function getById(int $id): ?EmployeePersistence {
        $eloquent = EmployeeEloquent::query()->find($id)->get();
        return $eloquent ? $this->toPersistence($eloquent) : null;
    }

    protected function toPersistence(Collection $row): EmployeePersistence {
        return new EmployeePersistence(
            $row['id'],
            $row['name'],
            $row['phone'],
            $row['department_id']
        );
    }

}
