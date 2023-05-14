<?php

namespace App\Modules\Employee\Persistence\Repository;

use App\Modules\Employee\Persistence\Entity\DepartmentPersistence;
use App\Modules\Employee\Persistence\DepartmentEloquent;
use Illuminate\Support\Collection;

class DepartmentRepository
{

    public function insert(DepartmentPersistence $department): int|string {
        $eloquent = new DepartmentEloquent([
            'name' => $department->getName(),
            'parent_id' => $department->getParentId()
        ]);

        $eloquent->save();

        return $eloquent->id;
    }

    public function update(DepartmentPersistence $department): void {
        DepartmentEloquent::query()
            ->where('id', '=', $department->getId())
            ->update([
                $department->getName(),
                $department->getParentId()
            ]);
    }

    public function delete(DepartmentPersistence $department): void {
        DepartmentEloquent::query()->find($department->getId())->delete();
    }

    public function getById(int $id): ?DepartmentPersistence {
       $eloquent = DepartmentEloquent::query()->find($id)->get();
       return $eloquent ? $this->toPersistence($eloquent) : null;
    }

    protected function toPersistence(Collection $row): DepartmentPersistence {
        return new DepartmentPersistence(
            $row['id'],
            $row['name'],
            $row['parent_id']
        );
    }

}
