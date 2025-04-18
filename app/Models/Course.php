<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //course table
    protected $table = 'courses';
    protected $primaryKey = 'course_id'; 
    protected $fillable = ['course_name','is_delete'];
}
