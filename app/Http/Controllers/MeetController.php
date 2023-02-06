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


// use Google_Service_Calendar_Event;

class MeetController extends Controller
{
    public function createMeeting()
    {
        $client = new MeetingServiceClient();

        $meeting = new Meeting();
        $meeting->setTitle('Example Meeting');
        $meeting->setAttendees(['attendee1@example.com', 'attendee2@example.com']);

        // Set the start time of the meeting in Unix timestamp format
        $startTime = (new DateTime('+1 hour'))->getTimestamp();
        $meeting->setStartTime($startTime);

        try {
            $createdMeeting = $client->createMeeting($meeting);
            return $createdMeeting->getJoinUrl();
        } catch (GoogleException $e) {
            return $e->getMessage();
        } finally {
            $client->close();
        }
    }
}
