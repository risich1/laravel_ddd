<?php

namespace App\Modules\Employee\Persistence\Entity;

use App\Modules\Employee\Domain\Department;

class EmployeePersistence
{
    public function __construct(
        private int $id,
        private string $name,
        private int $phone,
        private int $departmentId
    )
    {}

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getPhone(): int
    {
        return $this->phone;
    }

    /**
     * @param int $phone
     */
    public function setPhone(int $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return int
     */
    public function getDepartmentId(): int
    {
        return $this->departmentId;
    }

    /**
     * @param int $department
     */
    public function setDepartment(int $department): void
    {
        $this->departmentId = $department;
    }

}
