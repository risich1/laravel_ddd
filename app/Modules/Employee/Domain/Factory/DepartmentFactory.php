<?php

namespace App\Modules\Employee\Domain\Factory;

use App\Modules\Employee\Domain\Department;

class DepartmentFactory
{
    public function get(string $name, ?int $id = null, ?Department $parent = null) {
        return new Department(
            $name, $id, $parent
        );
    }
}
