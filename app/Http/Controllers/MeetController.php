<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Google_Service_Calendar_EventDateTime;

// use Google_Service_Calendar_Event;

class MeetController extends Controller
{
    public function createMeeting()
    {
        // create a new Google client
        $client = new Google_Client();
        $client->setApplicationName('Your App Name');
        $client->setScopes(Google_Service_Calendar::CALENDAR);
        $client->setAuthConfig(asset('storage.data.credentials.json'));

        // create a new calendar service
        $service = new Google_Service_Calendar($client);
        // create a new event
        $event = new Google_Service_Calendar_Event();
        $event->setSummary('Test Meeting');
        $event->setLocation('Online');
        $start = new Google_Service_Calendar_EventDateTime();
        $start->setDateTime('2022-01-01T09:00:00.000Z');
        $event->setStart($start);
        $end = new Google_Service_Calendar_EventDateTime();
        $end->setDateTime('2022-01-01T10:00:00.000Z');
        $event->setEnd($end);

        // insert the event
        $createdEvent = $service->events->insert('primary', $event);

        // return the event details
        return $createdEvent;
    }

}
