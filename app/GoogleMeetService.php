<?php

namespace App;

use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Google_Service_Calendar_EventAttendee;
use Google_Service_Calendar_EventDateTime;
use Google\Apis\Meet\v1\MeetService;

class GoogleMeetService
{
    private $client;

    public function __construct()
    {
        $this->client = new Google_Client();
        $this->client->setApplicationName('Google Meet Integration');
        $this->client->setScopes(Google_Service_Calendar::CALENDAR);
        $this->client->setAuthConfig(config_path('google_api_credentials.json'));

        $this->client->setAccessType('offile');
        $this->client->setPrompt('select_account consent');
    }

    public function getClient()
    {
        return $this->client;
    }
    public function authenticate()
    {
        $this->client->authenticate($_GET['code']);
        $accessToken = $this->client->getAccessToken();
        $this->client->setAccessToken($accessToken);
    }
    public function createMeet($summary, $description, $startTime, $endTime)
    {
        $calendarService = new Google_Service_Calendar($this->client);

        // Define the calendar ID
        $calendarId = 'primary';

        // Create the Google Meet event
        $event = new Google_Service_Calendar_Event();
        $event->setSummary("Test Meeting");
        $event->setLocation("Online");
        $start = new Google_Service_Calendar_EventDateTime();
        $start->setDateTime("2023-02-07T12:00:00+05:30");
        $start->setTimeZone("Asia/Kolkata");
        $event->setStart($start);
        $end = new Google_Service_Calendar_EventDateTime();
        $end->setDateTime("2023-02-07T13:00:00+05:30");
        $end->setTimeZone("Asia/Kolkata");
        $event->setEnd($end);

        // Add attendees to the event
        $attendee1 = new Google_Service_Calendar_EventAttendee();
        $attendee1->setEmail("attendee1@example.com");
        $attendees = array($attendee1);
        $event->attendees = $attendees;

        // Insert the event on the calendar
        $event = $calendarService->events->insert($calendarId, $event);

        // Get the join URL for the meeting
        $joinUrl = $event->getJoinUrl();
        return $joinUrl;
    }
}
