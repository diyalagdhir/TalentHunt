<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobDepartment extends Model
{
    use HasFactory;

    protected $table = 'job_departments'; // Explicitly map to the table
    protected $primaryKey = 'department_id'; // If your primary key is department_id
}
