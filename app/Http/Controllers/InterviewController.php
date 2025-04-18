<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Services\ZoomServices;
use App\Models\Interview;
use Illuminate\Support\Facades\Http;

class InterviewController extends Controller
{
    // protected $zoomService;

    // public function __construct(ZoomServices $zoomService) // Updated Service Name
    // {
    //     $this->zoomService = $zoomService;
    // }


    public function scheduleInterview(Request $request)
    {
        //dd($request);
       // Validate the data
       

        // Get app_id and other data
        $appId = $request->app_id;
        $date = $request->date;
        $startTime = $request->startTime;
        //echo $startTime;die;
        //$startDateTime = $date . ' ' . $startTime . ':00'; // Concatenate date and start time

         // Combine date and time into a single DateTime string
         $interviewTime = Carbon::createFromFormat('Y-m-d H:i', "{$request->date} {$request->startTime}")->format('Y-m-d\TH:i:s');
        //echo $interviewTime;die;
          // Instantiate ZoomServices directly (not preferred)
            $zoomService = new ZoomServices();
         // Create the Zoom meeting using your zoomService
        $meeting = $zoomService->createMeeting(
            'Interview Schedule',
            $interviewTime, // Start time in 'Y-m-d\TH:i:s' format
            60,             // Duration in minutes
            'UTC'
        );
            
         // Extract meeting details from the Zoom response
        
         $meetingId = $meeting['id'];
         $startTime = Carbon::parse($meeting['start_time']); // Convert to Carbon instance
         $endTime = $startTime->copy()->addMinutes(60);
         $joinUrl   = $meeting['join_url'];
         $password  = $meeting['password'];

        
        
        

        // Insert the interview details into the interviews table
        DB::table('interview')->insert([
            'meeting_id'    => $meetingId,
            'schedule_date' => $startTime->toDateString(),
            'start_time'    => $startTime->toTimeString(),
            'end_time'      => $endTime->toTimeString(),
            'status'    => 'Schedule',
            'app_id'    =>  $request->inter_id,
            'meeting_link'  => $joinUrl,
            'meeting_code'  => $password,
            'created_at'    => now(),
            'updated_at'    => now(),
            'user_id'   => $user_id,
        ]);


        // Redirect back with success message
        return redirect()->route('manageInterviews')->with('success', 'Interview scheduled successfully.');
    }
}
