<?php

namespace App\Modules\Employee\Domain\Actions;

use App\Modules\Employee\Domain\Employee;

interface IGetEmployeeById
{
    public function handle(int $id): ?Employee;
}
