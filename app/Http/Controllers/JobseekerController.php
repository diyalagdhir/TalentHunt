<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Feedback;
use App\Models\JobUpload;
use App\Models\JobApplied;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class JobseekerController extends Controller
{
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
    
        $jobs = $query->get();
        return view('jobseeker.available_jobs', compact('jobs'));
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
    
        // Upload Resume
        $resumePath = $request->file('resume')->store('resumes', 'public');
    
        // Store Application in job_applied table
        JobApplied::create([
            'user_id' => Auth::id(),
            'job_id' => $request->job_id,
            'resume' => $resumePath,
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
            ->get();
    
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
    
}
