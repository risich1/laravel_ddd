<?php

namespace App\Modules\Employee\Domain\DTO;

class CreateDepartmentDTO
{

    public function __construct(
        private readonly string $name,
        private readonly ?int $parentId
    ) {}

    public function getName():string {
        return $this->name;
    }

    public function getParentId(): ?int {
        return $this->parentId;
    }

}
