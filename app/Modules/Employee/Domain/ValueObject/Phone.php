<?php

namespace App\Modules\Employee\Domain\ValueObject;

use http\Exception\InvalidArgumentException;

class Phone
{
    private string $value;

    public function __construct(string $value)
    {
        $this->validate($value);
        $this->value = $value;
    }

    public function getValue(): string {
        return $this->value;
    }

    private function validate(string $value) {
        if (!preg_match('/^\d{10}$/', $value)) {
            throw new InvalidArgumentException('invalid phone');
        }
    }
}
