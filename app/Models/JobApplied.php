<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobApplied extends Model
{
    use HasFactory;

    protected $table = 'job_applied'; 

    protected $primaryKey = 'app_id';

    protected $fillable = [
        'user_id',
        'job_id',
        'application_status',
        'message',
        'resume',
        'experience',
        'application_date'
    ];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function job()
    // {
    //     return $this->belongsTo(JobUpload::class, 'job_id', 'job_id');
    // }
}
