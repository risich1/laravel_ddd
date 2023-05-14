<?php

namespace App\Modules\Employee\Domain\Actions;

use App\Modules\Employee\Domain\Employee;
use App\Modules\Employee\Domain\ValueObject\Phone;

interface IGetEmployeeByPhone
{
    public function handle(Phone $phone): ?Employee;
}
