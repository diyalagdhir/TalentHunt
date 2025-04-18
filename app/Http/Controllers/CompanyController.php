<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\JobApplied;
use App\Models\JobUpload;
use App\Models\User;    
use App\Models\Feedback;
use App\Models\Interview;
use App\Models\Country;
use App\Models\States;
use App\Models\Cities;
use App\Models\JobCategory;
use App\Models\JobDepartment;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function dashboard() {

        $jobApplications = JobApplied::count();
        $jobUploads = JobUpload::count();
        $users = User::count();
        $interview = Interview::count();
    
        return view('company.dashboard', compact('jobApplications', 'jobUploads', 'users', 'interview'));
    }


    public function CompanyFeedback() {
        return view('company.feedback');
    }

    public function CompanyFeedback_store(Request $request){
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'message' => 'required|string|max:500',
        ]);

        Feedback::create([
            'user_id' => auth()->id(),
            'rating' => $request->rating,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Your feedback just made our day! 🌟 Thanks for sharing your thoughts!');

    }

    //Display jobs
    public function manage_jobs() {
        $jobs = JobUpload::paginate(5);
        $countries = Country::all(); // Fetch all countries
        $states = States::all(); // Fetch all states
        $cities = Cities::all(); // Fetch all cities
        $departments = JobDepartment::all();
        $categories = JobCategory::all();
        $country_id = null; // Define it to avoid undefined error
        $state_id = null;
        $city_id = null;
        return view('company.manageJobs', compact('jobs', 'countries', 'states', 'cities', 'departments', 'categories', 'country_id', 'state_id', 'city_id'));
    }

    //Add jobs
    public function addJob(Request $request) {
        //dd($request->all());die;
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'num_of_vacancy' => 'required|integer',
            'status' => 'required|string',
            'working_hours' => 'required|string',
            'posted_date' => 'required|date',
            'closing_date' => 'required|date',
            'experience' => 'required|string',
            'job_skill_required' => 'required|string',
            'contact_email' => 'required|email',
            'category_id' => 'required',
            'department_id' => 'required',
            'country_id' => 'required|exists:country,country_id',
            'state_id' => 'required|exists:states,state_id',
            'city_id' => 'required|exists:cities,city_id',
        ]);
    
       
        if(Auth::check())
        {
            
            JobUpload::create([

                'title' => $request->title,
                'description' => $request->description,
                'num_of_vacancy' => $request->num_of_vacancy,
                'status' => $request->status,
                'experience' => $request->experience,
                'job_skill_required' => $request->job_skill_required,
                'contact_email' => $request->contact_email,
                'job_working_hours' => $request->working_hours,
                'posted_date' => $request->posted_date,
                'closing_date' => $request->closing_date,
                'category_id' => $request->category_id,
                'department_id' => $request->department_id,
                'country_id' => $request->country_id,
                'state_id' => $request->state_id,
                'city_id' => $request->city_id,
                'company_id' => Auth::user()->id, // Storing the logged-in user's ID
            ]);
        
        }
        return redirect()->back()->with('success', 'Job added successfully!');
    }

    //Edit jobs
    public function editJob (Request $request) 
    {
        //dd($request->all());
        $rules = [
            'title' => 'required|max:255',
            'description' => 'required|max:1000',
            'num_of_vacancy' => 'required',
            'experience' => 'required|max:255',
            'job_skill_required' => 'required', 
            'status' => 'required|',
            'working_hours' => 'required',
            'posted_date' => 'required',
            'closing_date' => 'required',
            'contact_email' => 'required',
            'category_id' => 'required',
            'department_id' => 'required',
            'edit_country_id' => 'required',
            'edit_state_id' => 'required',
            'edit_city_id' => 'required',
        ];

        $request->validate($rules);
    
        if(Auth::check())
        {   
            $id = $request->input('edit_job_id');
            $skills = is_array($request->input('job_skill_required')) 
            ? implode(",", $request->input('job_skill_required')) 
            : $request->input('job_skill_required'); 
            $record = DB::table('job_upload')->where('job_id','=',$id)
                        ->update([
                            'title' => $request->input('title'),
                            'description' => $request->input('description'),
                            'num_of_vacancy' => $request->input('num_of_vacancy'),
                            'experience' => $request->input('experience'),
                            'job_skill_required' => $skills, 
                            'status' => $request->input('status'),
                            'job_working_hours' => $request->input('working_hours'),
                            'posted_date' => $request->input('posted_date'),
                            'closing_date' => $request->input('closing_date'),
                            'contact_email' => $request->input('contact_email'),
                            'category_id' => $request->input('category_id'),
                            'department_id' => $request->input('department_id'), 
                            'country_id' => $request->input('edit_country_id'), 
                            'state_id' => $request->input('edit_state_id'), 
                            'city_id' => $request->input('edit_city_id'), 
                        ]);
            return redirect()->route('manageJobs')->with('status', 'Job Updated Successfully...');
        }
        return redirect()->route('login')->with('status','Please firtly logged in...');
    }

    //Delete jobs
    public function deleteJob($job_id){
        $job = JobUpload::where('job_id', $job_id)->first();

        if (!$job) {
            return redirect()->back()->with('error', 'Job not found');
        }

        $job->delete();
        return redirect()->back()->with('success', 'Job deleted successfully');
    }

    //Display applications
    public function manage_applications() {
        $jobs = DB::table('job_applied')
        ->join('job_upload', 'job_applied.job_id', '=', 'job_upload.job_id')
        ->join('users', 'job_applied.user_id', '=', 'users.id')
        ->join('user_profiles', 'job_applied.user_id', '=', 'user_profiles.user_id')
        ->select(
            'job_applied.app_id','job_upload.title', 'users.name', 'users.email', 'user_profiles.contact', 'job_applied.application_date', 'job_applied.application_status'
        )->paginate(5);
        return view('company.manageApplications', compact('jobs'));
    }

    //Edit application
    public function editApplication(Request $request) {
        //dd($request->all());
        $request->validate([
            'app_id' => 'required|exists:job_applied,app_id',
            'application_status' => 'required|string',
        ]);

        DB::table('job_applied')
            ->where('app_id',$request->app_id)
            ->update(['application_status' => $request->application_status]);

        return redirect()->back()->with('status', 'Application status updated successfully...');
    }

    //View full application
    public function viewApplication ($id) {
        if(Auth::check())
        {
            $record = DB::table('job_applied as ja')
                        ->join('job_upload as ju', 'ju.job_id', '=', 'ja.job_id')
                        ->join('users', 'users.id', '=', 'ja.user_id')
                        ->join('user_profiles', 'user_profiles.user_id', '=', 'ja.user_id')
                        ->where('ja.app_id', '=', $id)
                        ->select(
                            'users.name as candidate_name',      
                            'users.email as candidate_email',    
                            'user_profiles.contact as candidate_contact',
                            'ja.experience',          
                            'ja.app_id',             
                            'ja.resume',              
                            'ja.application_date',               
                            'ja.message',                           
                            'ja.application_status' ,             
                        )->first();

            // If no record is found, redirect back with an error message
            if (!$record) {
                return redirect()->back()->with('error', 'Application not found');
            }
            return view('company.viewApplication',compact('record'));
        }
        // Redirect to login if the user is not authenticated
        return redirect()->route('login')->with('error', 'You must be logged in.');
    }

    //Download Resume
    public function DownloadResume (Request $request) {
        if(Auth::check()) {
            $filename = $request->query('filename');
            $path = public_path("storage/resumes/" . $filename);
            if (file_exists($path)) {
                return response()->download($path);
            } else {
                return back()->with('error', 'File not found!');
            }
            $file = $path.$filename;
            return response()->download($file);
        }
    }

    //Display interviews
    public function manage_interviews() {
        $interviews = Interview::paginate(5);
        return view('company.manageInterviews', compact('interviews'));
    }
    
}
