<?php

namespace App\Modules\Employee\Domain\Events;

use App\Modules\Employee\Domain\Department;
use App\Modules\Shared\Domain\Event\EventInterface;

class CreatedDepartmentEvent implements EventInterface
{
    public function __construct(Department $department)
    {
    }
}
