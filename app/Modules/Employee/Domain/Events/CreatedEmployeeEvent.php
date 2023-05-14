<?php

namespace App\Modules\Employee\Domain\Events;

use App\Modules\Employee\Domain\Employee;
use App\Modules\Shared\Domain\Event\EventInterface;

class CreatedEmployeeEvent implements EventInterface
{
    public function __construct(Employee $employee)
    {
    }
}
