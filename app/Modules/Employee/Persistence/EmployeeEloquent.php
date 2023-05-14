<?php

namespace App\Modules\Employee\Persistence;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeEloquent extends Model
{

    use HasFactory;

    protected $table = 'employees';

}
