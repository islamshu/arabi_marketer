<?php

namespace App;

use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Google_Service_Calendar_EventAttendee;
use Google_Service_Calendar_EventDateTime;
use Google\Apis\Meet\v1\MeetService;
use Google_Service_HangoutsMeet;
use Google_Service_HangoutsMeet_Meeting;
class GoogleMeetService
{
    private $client;

    public function __construct()
    {
        $this->client = new Google_Client();
        $this->client->setApplicationName('Google Meet Integration');
        // $this->client->setScopes(Google_Service_Calendar::CALENDAR);
        $this->client->addScope([\Google_Service_Calendar::CALENDAR, \Google_Service_Calendar::CALENDAR_EVENTS]);

        $this->client->setAuthConfig(config_path('google_api_credentials.json'));
        $this->client->setAccessType('offline');
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
        $calendarId = env('GOOGLE_CALENDAR_ID');

        $calendarService = new Google_Service_Calendar($this->client);

        $attendees = [
            [
                'email' => 'islamshu12@gmail.com',
                'responseStatus' => 'accepted'
            ],
          
        ];
        
        $event = new Google_Service_Calendar_Event([
            'summary' => 'Test Meeting',
            'location' => 'Online',
            'description' => 'This is a test meeting',
            'start' => [
                'dateTime' => '2023-02-09T09:00:00-07:00',
                'timeZone' => 'America/Los_Angeles',
            ],
            'end' => [
                'dateTime' => '2023-02-09T11:00:00-07:00',
                'timeZone' => 'America/Los_Angeles',
            ],
            // 'attendees' => [
            //     [
            //         'email' => 'islamshu12@gmail.com',
            //     ],
               
            // ],
           
            'conferenceData' => [
                'createRequest' => [
                  'conferenceSolutionKey' => [
                    'type' => 'hangoutsMeet'
                  ],
                  'requestId' => 'randomString123'
                ]
            ],
            
            // 'attendees' => $attendees,
            'reminders' => [
                'useDefault' => FALSE,
                'overrides' => [
                    ['method' => 'email', 'minutes' => 24 * 60],
                    ['method' => 'popup', 'minutes' => 10],
                ],
            ],
        ]);
        $optParams = ['conferenceDataVersion' => 1];

        $calendarId = env('GOOGLE_CALENDAR_ID');
        $calendarService->events->insert($calendarId, $event,$optParams);
        return $calendarService;

      
    }
}
