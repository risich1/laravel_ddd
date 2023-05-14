<?php

namespace App\Modules\Employee\Domain;

use App\Modules\Employee\Domain\Specification\EmployeeSpecification;
use App\Modules\Employee\Domain\ValueObject\EmployeeName;
use App\Modules\Employee\Domain\ValueObject\Phone;

class Employee {

    private ?int $id;
    private EmployeeName $name;
    private Phone $phone;
    private Department $department;

    public function __construct(
     ?int $id,
     EmployeeName $name,
     Phone $phone,
     Department $department,
     private readonly EmployeeSpecification $specification
    )
    {
        $this->setId($id);
        $this->setName($name);
        $this->setPhone($phone);
        $this->setDepartment($department);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): EmployeeName
    {
        return $this->name;
    }

    public function setName(EmployeeName $name): void
    {
        $this->name = $name;
    }

    public function getPhone(): Phone
    {
        return $this->phone;
    }

    public function setPhone(Phone $phone): void
    {
        $this->phone = $phone;
        $this
            ->specification
            ->personPhoneSpecification
            ->satisfy($this);
    }

    public function getDepartment(): Department
    {
        return $this->department;
    }

    public function setDepartment(Department $department): void
    {
        $this->department = $department;
    }

}
