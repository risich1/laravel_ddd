<?php

namespace App\Modules\Employee\Persistence\Entity;

class DepartmentPersistence
{

    public function __construct(
    private readonly ?int $id,
    private readonly string $name,
    private readonly ?int $parentId
    ) {}

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getParentId(): ?int {
        return $this->parentId;
    }

}
