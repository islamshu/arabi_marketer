<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Calendar;
use Google_Service_Calendar_Event;


// use Google_Service_Calendar_Event;

class MeetController extends Controller
{
    public function createMeeting()
    {


        $client = new Google_Client();
        $client->setApplicationName("Google Meet Laravel");
        // $client->setScopes([Google_Service_Calendar::CALENDAR, Google_Service_Calendar::CALENDAR_EVENTS]);
        $privateKeyJsonFile = file_get_contents(public_path("private_key.json"));
        // dd($privateKeyJsonFile);

        $client->setAuthConfig($privateKeyJsonFile);
        $service = new Google_Service_Calendar($client);
        $calendar = new Google_Service_Calendar_Calendar();
        $calendar->setSummary("Google Meet Meeting");
        $calendar->setTimeZone("UTC");
        $createdCalendar = $service->calendars->insert($calendar);

        $start = new \Google_Service_Calendar_EventDateTime();
        $start->setDateTime('2023-02-01T09:00:00.000Z');
        $start->setTimeZone('America/Los_Angeles');

        $end = new \Google_Service_Calendar_EventDateTime();
        $end->setDateTime('2023-02-01T17:00:00.000Z');
        $end->setTimeZone('America/Los_Angeles');

        $event = new \Google_Service_Calendar_Event();
        $event->setStart($start);
        $event->setEnd($end);
        $attendee1 = new \Google_Service_Calendar_EventAttendee();
        $attendee1->setEmail('islamshu12@gmail.com');

        $attendee2 = new \Google_Service_Calendar_EventAttendee();
        $attendee2->setEmail('islamshu12@gmail.com');
        $event->setAttendees([$attendee1, $attendee2]);

        $createdEvent = $service->events->insert($createdCalendar->getId(), $event);
        return $createdEvent;

    }
}
