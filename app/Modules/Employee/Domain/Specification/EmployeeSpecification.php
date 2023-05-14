<?php

namespace App\Modules\Employee\Domain\Specification;

class EmployeeSpecification
{
    public function __construct(
        public readonly EmployeePhoneSpecification $personPhoneSpecification
    ) {}
}
