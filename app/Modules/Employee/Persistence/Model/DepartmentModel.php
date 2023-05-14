<?php

namespace App\Modules\Employee\Persistence\Model;

use App\Modules\Employee\Domain\Department;
use App\Modules\Employee\Persistence\Entity\DepartmentPersistence;
use App\Modules\Employee\Persistence\Repository\DepartmentRepository;

class DepartmentModel
{
    public function __construct(private  readonly DepartmentRepository $repository) {}

    public function fromDomain(Department $department): DepartmentPersistence {
        return new DepartmentPersistence(
            $department->getId(),
            $department->getName(),
            $department->getParent()?->getId(),
        );
    }

    public function toDomain(DepartmentPersistence $persistence): Department {
        $parent = $persistence->getParentId() ? $this->repository->getById($persistence->getParentId()) : null;

        return new Department(
            $persistence->getId(),
            $persistence->getName(),
            $parent ? $this->toDomain($parent) : null
        );
    }

}
