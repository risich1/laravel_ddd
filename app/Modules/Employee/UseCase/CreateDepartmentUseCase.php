<?php

namespace App\Modules\Employee\UseCase;

use App\Modules\Employee\Domain\DTO\CreateDepartmentDTO;
use App\Modules\Employee\Domain\Events\CreatedDepartmentEvent;
use App\Modules\Employee\Domain\Factory\DepartmentFactory;
use App\Modules\Employee\Persistence\Action\CreateDepartment;
use App\Modules\Employee\Persistence\Action\GetDepartmentById;
use App\Modules\Shared\Domain\Entity\Aggregate;

class CreateDepartmentUseCase extends Aggregate
{
    public function __construct(
        private readonly CreateDepartment $createDepartment,
        private readonly GetDepartmentById $departmentById,
        private readonly DepartmentFactory $factory
    ) {}

    public function create(CreateDepartmentDTO $data): void {
        $parentId = $data->getParentId() ? $this->departmentById->handle($data->getParentId()) : null;
        $departmentId = $this->createDepartment->handle($this->factory->get(
            $data->getName(),
            null,
            $parentId
        ));

        $this->raise(new CreatedDepartmentEvent($this->departmentById->handle($departmentId)));
    }

}
