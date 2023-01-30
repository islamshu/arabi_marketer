<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Calendar;
use Google_Service_Calendar_Event;
use Google_Service_Calendar_EventDateTime;

// use Google_Service_Calendar_Event;

class MeetController extends Controller
{
    // public function createMeeting()
    // {
    //     // create a new Google client
    //     $client = new Google_Client();
    //     $client->setApplicationName("Google Meet Laravel");
    //     $client->setScopes([Google_Service_Calendar::CALENDAR, Google_Service_Calendar::CALENDAR_EVENTS]);
    //     $client->setAuthConfig($privateKeyJsonFile);
    //     $service = new Google_Service_Calendar($client);
    //     $calendar = new Google_Service_Calendar_Calendar();
    //     $calendar->setSummary("Google Meet Meeting");
    //     $calendar->setTimeZone("UTC");
    //     $createdCalendar = $service->calendars->insert($calendar);

    //     $event = new Google_Service_Calendar_Event();
    //     $event->setSummary("Google Meet Meeting");
    //     $event->setStart(array(
    //         'dateTime' => '2023-02-01T09:00:00.000Z',
    //         'timeZone' => 'UTC',
    //     ));
    //     $event->setEnd(array(
    //         'dateTime' => '2023-02-01T10:00:00.000Z',
    //         'timeZone' => 'UTC',
    //     ));
    //     $createdEvent = $service->events->insert($createdCalendar->getId(), $event);
    // }
}
