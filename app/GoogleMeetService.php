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

// Create new Calendar Event
$event = new Google_Service_Calendar_Event();
$event->setSummary("Example Meeting");
$event->setDescription("This is an example meeting created with Google Calendar API");
$start = new Google_Service_Calendar_EventDateTime();
$start->setDateTime("2023-02-07T10:00:00+00:00");
$start->setTimeZone("UTC");
$event->setStart($start);
$end = new Google_Service_Calendar_EventDateTime();
$end->setDateTime("2023-02-07T11:00:00+00:00");
$end->setTimeZone("UTC");
$event->setEnd($end);
$calendarId = "primary";
$event = $calendarService->events->insert($calendarId, $event);
$meetService = new MeetService($this->client);

// Generate a Google Meet link
$meet = $meetService->create();
$link = $meet->getJoinUrl();
// Get join URL for the created event
dd($link);

}
}