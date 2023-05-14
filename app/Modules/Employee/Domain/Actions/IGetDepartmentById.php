<?php

namespace App\Modules\Employee\Domain\Actions;

use App\Modules\Employee\Domain\Department;

interface IGetDepartmentById
{
    public function handle(int $id): ?Department;
}
