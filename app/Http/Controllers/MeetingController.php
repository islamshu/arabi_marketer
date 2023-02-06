<?php

namespace App\Http\Controllers;

use App\Classes\ZoomClient;
use App\Models\ZoomMeeting;
use App\Traits\ZoomMeetingTrait;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    use ZoomMeetingTrait;

    const MEETING_TYPE_INSTANT = 1;
    const MEETING_TYPE_SCHEDULE = 2;
    const MEETING_TYPE_RECURRING = 3;
    const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;

    public function index()
    {
        $path = 'users/me/meetings';
        $response = $this->zoomGet($path);

        $data = json_decode($response->body(), true);
        $data['meetings'] = array_map(function (&$m) {
            $m['start_at'] = $this->toUnixTimeStamp($m['start_time'], $m['timezone']);
            return $m;
        }, $data['meetings']);

        return [
            'success' => $response->ok(),
            'data' => $data,
        ];
    }
    public function show($id)
    {
        $meeting = $this->get($id);

        return view('meetings.index', compact('meeting'));
    }

    public function store(Request $request)
    {
        $topic = 'اسم الجلسة';
        $start_time = now();
        $agenda = 'اسم الجلسة';

        // $validator = Validator::make($request->all(), [
        //     'topic' => 'required|string',
        //     'start_time' => 'required|date',
        //     'agenda' => 'string|nullable',
        // ]);
        
        // if ($validator->fails()) {
        //     return [
        //         'success' => false,
        //         'data' => $validator->errors(),
        //     ];
        // }
        // $data = $validator->validated();
    
        $path = 'users/me/meetings';
        $response = $this->zoomPost($path, [
            'topic' => $topic,
            'type' => self::MEETING_TYPE_SCHEDULE,
            'start_time' => $this->toZoomTimeFormat($start_time),
            'duration' => 30,
            'agenda' => $agenda,
            'timezone'     => 'Asia/Riyadh',
            'settings'   => [
                'waiting_room'      => false,
            ],
            // 'schedule_for'=> 'islamshublaq@hotmail.com',
        ]);
        $data = json_decode($response->body(), true);
        // dd($data['id']);
        // $this->update($data['id'], $request->all());
        return [
            'success' => $response->status() === 201,
            'data' => json_decode($response->body(), true),
        ];
    }
    public function store2(Request $request)
    {
        $apiKey = env('ZOOM_API_KEY', '');
        $apiSecret = env('ZOOM_API_SECRET', '');
        $zoomClient = new ZoomClient($apiKey, $apiSecret);
        
        // $email = $request->input('email');
        // $first_name = $request->input('first_name');
        // $last_name = $request->input('last_name');
        
        $user = $zoomClient->createUser([
            'email' => 'islamshublaq@hotmail.com',
            'first_name' => 'islam',
            'last_name' => 'shublaq',
            'password '=>'test123'
        ]);
        return $user;
        
        // Store the user's Zoom user ID in your database
        // ...
        
        return view('user.show', ['user' => $user]);
    }

    // public function update($meeting, Request $request)
    // {
    //     $this->update($meeting->zoom_meeting_id, $request->all());

    //     return redirect()->route('meetings.index');
    // }

    public function destroy(ZoomMeeting $meeting)
    {
        $this->delete($meeting->id);

        return $this->sendSuccess('Meeting deleted successfully.');
    }
}