<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;

class MeetController extends Controller
{
    public function createMeeting()
    {
        dd('f');
        // Create a new Google_Client instance
        $client = new Google_Client();

        // Set the client id and client secret
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));

        // Set the redirect URI
        $client->setRedirectUri(route('meet.callback'));

        // Set the scopes
        $client->addScope(Google_Service_Calendar::CALENDAR);

        // Check if the user has granted access
        if (!$client->getAccessToken()) {
            // Redirect the user to the authorization page
            return redirect($client->createAuthUrl());
        }

        // Create a new instance of the Calendar service
        $service = new Google_Service_Calendar($client);

        // Create a new event
        $event = new Google_Service_Calendar_Event();
        $event->setSummary('Test Meeting');

        // Insert the event
        $createdEvent = $service->events->insert('primary', $event);

        // Get the join URL for the meeting
        $joinURL = $createdEvent->getJoinUrl();

        // Redirect the user to the join URL
        return redirect($joinURL);
    }

    public function callback(Request $request)
    {
        // Create a new Google_Client instance
        $client = new Google_Client();

        // Set the client id and client secret
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));

        // Set the redirect URI
        $client->setRedirectUri(route('meet.callback'));

        // Set the scopes
        $client->addScope(Google_Service_Calendar::CALENDAR);

        // Get the access token
        $client->fetchAccessTokenWithAuthCode($request->get('code'));

        // Store the access token in the session
        session(['access_token' => $client->getAccessToken()]);

        // Redirect the user back to the create meeting page
        return redirect()->route('meet.create');
    }
}
