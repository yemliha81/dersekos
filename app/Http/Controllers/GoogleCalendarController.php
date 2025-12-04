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

        $request->validate([
            'title' => 'required',
            'start' => 'required',
            'end'   => 'required',
        ]);

        $client = $this->getClient();
        $client->setAccessToken(session('google_token'));

        $service = new \Google\Service\Calendar($client);

        // ✅ TARİH FORMATINI GOOGLE UYUMLU HALE GETİR
        $start = \Carbon\Carbon::parse($request->start, 'Europe/Istanbul')
            ->setTimezone('Europe/Istanbul')
            ->toRfc3339String();

        $end = \Carbon\Carbon::parse($request->end, 'Europe/Istanbul')
            ->setTimezone('Europe/Istanbul')
            ->toRfc3339String();


        $event = new \Google\Service\Calendar\Event([
            'summary' => $request->title,
            'description' => $request->description,
            'start' => [
                'dateTime' => $start,
                'timeZone' => 'Europe/Istanbul',
            ],
            'end' => [
                'dateTime' => $end,
                'timeZone' => 'Europe/Istanbul',
            ],
        ]);

        try {
            $service->events->insert('primary', $event);
        } catch (\Exception $e) {
            dd('GOOGLE API HATASI:', $e->getMessage());
        }

        return back()->with('success', '✅ Etkinlik Google Takvim’e eklendi!');
    }

    public function listCalendars()
    {
        if (!session()->has('google_token')) {
            return redirect('/google');
        }

        $client = $this->getClient();
        $client->setAccessToken(session('google_token'));

        $service = new \Google\Service\Calendar($client);

        $calendarList = $service->calendarList->listCalendarList();

        return view('calendars', [
            'calendars' => $calendarList->getItems()
        ]);
    }

    
}
