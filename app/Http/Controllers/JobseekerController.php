<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\UserProfile;
use App\Models\Course;
use App\Models\CompanyProfiles;
use App\Models\Skills;
use App\Models\Feedback;
use App\Models\JobUpload;
use App\Models\JobApplied;
use App\Models\Cities;
use App\Models\States;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
class JobseekerController extends Controller
{

    public function index() {
        return view('jobseeker.index');
    }

    public function about() {
        return view('jobseeker.about');
    }

    public function contact() {
        return view('jobseeker.contact');
    }

     //for country->state->city fetching dropdown
     public function get_country()
     {
         $result = DB::table('country')->get();
         $countries = [];
         foreach($result as $row)
         {
             $countries[] = $row;
         }
         return response()->json($countries);
     }
     public function get_state(Request $request, $country_id)
     {
         // Fetch states based on country_id
         $result = DB::table('states')->where('country_id', '=', $country_id)->get();
         $states = [];
         foreach ($result as $row) {
             $states[] = $row;
         }
         return response()->json($states);
     }
     public function get_city(Request $request, $state_id)
     {
         // Fetch cities based on state_id
         $result = DB::table('cities')->where('state_id', '=', $state_id)->get();
         $cities = [];
         foreach ($result as $row) {
             $cities[] = $row;
         }
         return response()->json($cities);
     }

    public function feedback() {
        return view('jobseeker.feedback');
    }

    public function store(Request $request)
    {


        // Check if the user is logged in
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to send a message.');
        }

        // Validate form data
        
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'contact' => 'required|string|max:20', // Changed to string based on migration
            'message' => 'required|string',
        ]);

        // Save contact data
        Contact::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'contact' => $request->contact,
            'message' => $request->message,
        ]);

        // Redirect with success message
        return redirect()->back()->with('success', 'Got it! Your message is now on its way to us. Expect a response soon!');
    }

    public function available_jobs(Request $request) {
        $query = JobUpload::query();
    
        // If there's a search term, filter by job title
        if ($request->has('search') && !empty($request->search)) {
            $query->where('title', 'LIKE', '%' . $request->search . '%');
        }
    
        $jobs = $query->paginate(3);

        // Fetch job IDs that the logged-in user has already applied for
        $appliedJobIds = JobApplied::where('user_id', Auth::id())->pluck('job_id')->toArray();

        return view('jobseeker.available_jobs', compact('jobs', 'appliedJobIds'));
    }

    public function available_jobs_details($id) {
        $job = JobUpload::with(['category', 'department', 'country', 'state', 'city'])->findOrFail($id);
        
        return view('jobseeker.available_jobs_details', compact('job'));
    }

    public function apply(Request $request) {
        $request->validate([
            'job_id' => 'required|exists:job_upload,job_id',
            'resume' => 'required|mimes:pdf,doc,docx|max:2048',
            'experience' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]);
    
        // Check if the user has already applied for this job before
        $existingApplication = JobApplied::where('user_id', Auth::id())
            ->where('job_id', $request->job_id)
            ->exists();
    
        if ($existingApplication) {
            return back()->with('error', 'You have already applied for this job.');
        }
    
        // Upload Resume
        $resume = $request->file('resume');
        $filename = $resume->getClientOriginalName(); // Get original filename
        $resumePath = $resume->storeAs('resumes', $filename, 'public'); 

        // Store Application
        JobApplied::create([
            'user_id' => Auth::id(),
            'job_id' => $request->job_id,
            'resume' => $filename,
            'application_status' => 'pending',
            'application_date' => now(),
            'experience' => $request->experience,
            'message' => $request->message,
        ]);
    
        return back()->with('success', 'Application submitted successfully.');
    }

    
    public function applied_jobs() {
        // Fetch applied jobs for the logged-in user
        $appliedJobs = JobApplied::where('user_id', Auth::id())
            ->join('job_upload', 'job_applied.job_id', '=', 'job_upload.job_id') // Join to get job title
            ->select('job_applied.*', 'job_upload.title', 'job_upload.description') // Select necessary fields
            ->paginate(3);
    
        return view('jobseeker.applied_jobs', compact('appliedJobs'));
    }

    public function feedback_store(Request $request) {

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'message' => 'required|string|max:500',
        ]);
    
        \Log::info('Feedback Data:', $request->all());
    
        Feedback::create([
            'user_id' => auth()->id(),
            'rating' => $request->rating,
            'message' => $request->message,
        ]);
        
    
        return redirect()->back()->with('success', 'Your feedback just made our day! 🌟 Thanks for sharing your thoughts!');
    }


    //user profile 
    public function userProfile()
    {
        if(Auth::check())
        {
            $user_id = Auth::user()->id;
            $user_profile = UserProfile::where('user_id','=',$user_id)->first();
            $courses = Course::all();
            $skills = Skills::all();
            return view('jobseeker.userprofile',compact('courses','skills','user_profile'));
        }
    }
    
    public function UpdateProfile(Request $request)
    {    
        
        $user_id = Auth::user()->id; 
        $validated = $request->validate([
            'objective' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'contact' => 'required|string|min:10',
            'courses' => 'required|array',
            'skill_id' => 'required|array',
            'resume' => 'nullable|mimes:pdf,doc,docx,txt',
            'image' => 'nullable|mimes:png,jpg,jpeg', 
            'count_id' => 'required|integer',
            'state_id' => 'required|integer',
            'city_id' => 'required|integer',
            
        ]);
        $record = DB::table('user_profiles')->where('user_id','=',$user_id)->first();
        $img_name = $record->user_image;
        $resume_name = $record->resume_file; 
        if($request->hasFile('image')){
            $img = $request->file('image');
            $img_name = $img->getClientOriginalName();
            $img_path = 'user/upload/img';
            if (!$img) {
                return redirect()->back()->withErrors('Both image and resume are required.');
            }
            $img->move($img_path, $img_name);
            
        }elseif($request->hasFile('resume')){
            $resume = $request->file('resume');
            $resume_name = $resume->getClientOriginalName();
            //echo $resume_name;die;
            $resume_path = 'user/upload/resume';
            if (!$resume) {
                return redirect()->back()->withErrors('Both image and resume are required.');
            }
            $resume->move($resume_path, $resume_name);
        }
        
        $courses = implode(",", $request->input('courses'));
        $skills = implode(",", $request->input('skill_id'));
        
        if ($user_id) {
            
            $user_profile = DB::table('user_profiles')->where('user_id', '=', $user_id)->update([
                'objective' => $request->objective,
                'designation' => $request->designation,
                'address' => $request->address,
                'contact' => $request->contact,
                'course' => $courses,
                'skills' => $skills,
                'resume_file' => $resume_name,
                'user_image' => $img_name,
                'country_id' => $request->count_id,
                'state_id' => $request->state_id,
                'city_id' => $request->city_id,
            ]);
            if ($user_profile) {
                
                return redirect()->route('userProfile')->with('status', 'Profile updated successfully...');
            } else {
                return redirect()->back()->withErrors('Failed to update profile. Please try again.');
            }
        } else {
            return redirect()->back()->withErrors('User not found.');
        }
    }
    
}
