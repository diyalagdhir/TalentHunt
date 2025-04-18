<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    use HasFactory;

    protected $table = 'job_categories'; // Explicitly map to the table
    protected $primaryKey = 'category_id'; // If your primary key is category_id
}
