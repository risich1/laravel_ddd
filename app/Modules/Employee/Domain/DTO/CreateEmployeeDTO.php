<?php

namespace App\Modules\Employee\Domain\DTO;

class CreateEmployeeDTO
{

    public function __construct(
        private readonly string $name,
        private readonly string $surname,
        private readonly int $phone,
        private readonly int $department,
        private readonly ?string $patronymic = null,
    ) {}

    public function getSurname(): string {
        return $this->surname;
    }

    public function getName():string {
        return $this->name;
    }

    public function getPatronymic(): ?string {
        return $this->patronymic;
    }

    public function getDepartment(): int {
        return $this->department;
    }

    public function getPhone(): int {
        return $this->phone;
    }

}
