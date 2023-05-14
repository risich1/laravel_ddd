<?php

namespace App\Modules\Employee\Domain;

use http\Exception\InvalidArgumentException;

class Department
{

    private ?Department $parent = null;
    private readonly ?int $id;
    private readonly string $name;

    public function __construct(string $name, ?int $id = null, ?Department $parent = null) {
        $this->setName($name);
        $this->setId($id);

        if (!is_null($parent)) {
            $this->setParent($parent);
        }
    }

    private function setId(?int $id): void {
        $this->id = $id;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): self {
        $this->name = $name;
        return $this;
    }

    public function getParent(): ?Department {
        return $this->parent;
    }

    public function setParent(Department $parent): self {
        if (is_null($parent->getId())) {
            throw new InvalidArgumentException('Parent department must have id');
        }

        if ($parent->getId() !== $this->getId()) {
            throw new InvalidArgumentException('Parent department must not be equal the department');
        }

        $this->parent = $parent;
        return $this;
    }

}
