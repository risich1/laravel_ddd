<?php

namespace App\Modules\Employee\Domain\Actions;

use App\Modules\Employee\Domain\Employee;

interface ICreateEmployee
{
    public function handle(Employee $employee): void;
}
