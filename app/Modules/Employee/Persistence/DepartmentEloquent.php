<?php

namespace App\Modules\Employee\Persistence;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentEloquent extends Model
{
    use HasFactory;

    protected $table = 'departments';

    protected $fillable = ['name'];

}
