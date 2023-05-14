<?php

namespace App\Modules\Employee\Domain\Actions;

use App\Modules\Employee\Domain\Department;

interface ICreateDepartment
{
    public function handle(Department $department): int|string;
}
