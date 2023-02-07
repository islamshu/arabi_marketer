<?php

namespace App;

use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;

class GoogleMeetService
{
    private $client;

    public function __construct()
    {
        $this->client = new Google_Client();
        $this->client->setApplicationName('Google Meet Integration');
        $this->client->setScopes(Google_Service_Calendar::CALENDAR);
        $this->client->setAuthConfig(config_path('google_api_credentials.json'));
        $this->client->setAccessType('online');
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
    $calendarId = 'primary';
    $event = new Google_Service_Calendar_Event([
        'summary' => $summary,
        'description' => $description,
        'start' => [
            'dateTime' => $startTime,
            'timeZone' => 'Asia/Kolkata',
        ],
        'end' => [
            'dateTime' => $endTime,
            'timeZone' => 'Asia/Kolkata',
        ],
        'reminders' => [
            'useDefault' => false,
            'overrides' => [
                ['method' => 'email', 'minutes' => 24 * 60],
                ['method' => 'popup', 'minutes' => 10],
            ],
        ],
    ]);
    $event = $calendarService->events->insert($calendarId, $event);
    return $event;
}
}