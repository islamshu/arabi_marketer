<?php

namespace App\Http\Controllers;

use DateTime;
use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\LongRunning\OperationsClient;
use Google\ApiCore\OperationResponse;
use Google\ApiCore\PathTemplate;
use Google\ApiCore\RequestParamsHeaderDescriptor;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\Auth\FetchAuthTokenInterface;
use Google\Cloud\Core\Exception\GoogleException;
use Google\Cloud\Core\Exception\ServiceException;
use Google\Cloud\Core\LongRunning\OperationsClient as LROClient;
use Google\Cloud\Core\LongRunning\OperationsClientInterface;
use Google\Cloud\Core\LongRunning\OperationsTransport;
use Google\Cloud\Meet\V1\Meeting;
use Google\Cloud\Meet\V1\MeetingServiceClient;
use App\GoogleMeetService;
use Carbon\Carbon;
use Spatie\GoogleCalendar\Event;
use Illuminate\Http\Request;


// use Google_Service_Calendar_Event;

class MeetController extends Controller
{
    public function google_meet(){
        $event = new Event;

        $event->name = 'test';
        $event->description = 'Event descriptionfff';
        $event->startDateTime = Carbon::now();
        $event->endDateTime = Carbon::now()->addHour();
        // $event->addAttendee([
        //     'email' => 'islamshublaq@hotmail.com',
        //     'name' => 'John Doe',
        //     'comment' => 'Lorum ipsum',
        // ]);
        // $event->addAttendee(['email' => 'attendee@example.com']);
        
        $event->addAttendee([
            'email' => 'juan.perez@example.com',
            'name' => 'juan',
            'comment' => 'prueba de la API',
        ]);
        
        $optParams = [
            'sendNotifications' => true
        ];
        
        $event->save('insertEvent', $optParams);
        dd($event);
    }
    public function createMeeting(Request $request)
    {
        $summary = 'test';
        $description = 'test';
        $startTime = now()->addHour();
        $endTime = now()->addHours(2);
        // $newDateTime = Carbon::now()->addHours(5);


        $googleAPI = new GoogleMeetService();
        $event = $googleAPI->createMeet($summary, $description, $startTime, $endTime);
        dd($event);
        return response()->json([
            'event' => $event,
        ]);
    }
}
