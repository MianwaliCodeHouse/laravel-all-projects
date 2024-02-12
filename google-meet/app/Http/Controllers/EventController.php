<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    // Create an event with a Google Meet link
    public function createEvent()
    {
        $user = Auth::user(); // Get the authenticated user

        // Set up the Google API client with user credentials obtained from Socialite.
        $client = new Google_Client();
        $client->setAuthConfig($userCredentials);

        // Initialize the Calendar service.
        $service = new Google_Service_Calendar($client);

        $event = new Google_Service_Calendar_Event([
            'summary' => 'Meeting Title',
            'start' => ['dateTime' => '2023-10-17T09:00:00', 'timeZone' => 'UTC'],
            'end' => ['dateTime' => '2023-10-17T10:00:00', 'timeZone' => 'UTC'],
            'conferenceData' => [
                'createRequest' => [
                    'requestId' => 'random-request-id',
                ],
            ],
        ]);

        // Insert the event.
        $event = $service->events->insert('primary', $event);

        // Retrieve the Google Meet link from the event
        $meetLink = $event->getConferenceData()->getEntryPoints()[0]->getUri();

        // You can store or use the meetLink as needed
        // ...

        return view('event_created', compact('meetLink'));
    }
}
