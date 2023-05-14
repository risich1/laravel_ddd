<?php

namespace App\Modules\Employee\Domain\ValueObject;

class EmployeeName
{

    public function __construct(
        private readonly string $surname,
        private readonly string $name,
        private readonly ?string $patronymic = null
    )
    {
        $this->validateName($this->name);
        $this->validatePatronymic($this->patronymic);
        $this->validateSurname($this->patronymic);
    }

    public function getFullName(): string {
        $parts = [
            $this->getSurname(),
            $this->getName(),
            $this->getPatronymic()
        ];

        return implode(' ', array_filter($parts, fn ($part) => $part));
    }

    public function getSurname(): string {
        return $this->surname;
    }

    public function getName():string {
        return $this->name;
    }

    public function getPatronymic(): ?string {
        return $this->patronymic;
    }

    private function validateSurname(string $value) {
    }

    private function validateName(string $value) {
    }

    private function validatePatronymic(string $value) {
    }

}
