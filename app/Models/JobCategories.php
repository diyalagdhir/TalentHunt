<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobCategories extends Model
{
    protected $table = 'job_categories'; 
    protected $primaryKey = 'category_id';
}
