<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;

    protected $fillable = ['interview_id', 'schedule_date', 'start_time', 'end_time', 'meeting_link', 'status','app_id'];
}
