<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Client;
use Google\Service\Calendar;

class GoogleCalendarController extends Controller
{
    private function getClient()
    {
        $client = new Client();
        $client->setClientId(config('services.google.client_id'));
        $client->setClientSecret(config('services.google.client_secret'));
        $client->setRedirectUri(config('services.google.redirect'));
        $client->setScopes(Calendar::CALENDAR);
        $client->setAccessType('offline');
        $client->setPrompt('consent');

        return $client;
    }

    public function redirect()
    {
        $client = $this->getClient();
        return redirect($client->createAuthUrl());
    }

    public function callback(Request $request)
    {
        $client = $this->getClient();
        $token = $client->fetchAccessTokenWithAuthCode($request->code);

        session(['google_token' => $token]);

        return redirect('/event-form');
    }

    public function addEvent(Request $request)
    {
        if (!session()->has('google_token')) {
            return redirect('/google');
        }

        $client = $this->getClient();
        $client->setAccessToken(session('google_token'));

        $service = new Calendar($client);

        $event = new \Google\Service\Calendar\Event([
            'summary' => $request->title,
            'description' => $request->description,
            'start' => [
                'dateTime' => $request->start,
                'timeZone' => 'Europe/Istanbul',
            ],
            'end' => [
                'dateTime' => $request->end,
                'timeZone' => 'Europe/Istanbul',
            ],
        ]);

        $service->events->insert('primary', $event);

        return back()->with('success', '✅ Etkinlik Google Takvim’e eklendi!');
    }
}
