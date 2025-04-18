<?php

namespace App\Models;
use App\Models\JobCategory;
use App\Models\JobDepartment;
use App\Models\Country;
use App\Models\States;
use App\Models\Cities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobUpload extends Model
{
    use HasFactory;

    protected $table = 'job_upload'; 
    protected $primaryKey = 'job_id';
    public $timestamps = false; 

    // Relationships
  

    public function category() {
        return $this->belongsTo(JobCategory::class, 'category_id');
    }

    public function department() {
        return $this->belongsTo(JobDepartment::class, 'department_id');
    }

    public function country() {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function state() {
        return $this->belongsTo(States::class, 'state_id');
    }

    public function city() {
        return $this->belongsTo(Cities::class, 'city_id');
    }

    protected $fillable = [
        'title',
        'experience',
        'job_skill_required',
        'description',
        'num_of_vacancy',
        'status',
        'job_working_hours',
        'posted_date',
        'closing_date',
        'contact_email',
        'company_id',
        'category_id',
        'department_id',
        'country_id',
        'state_id',
        'city_id',
    ];
}
