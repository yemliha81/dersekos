<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Client;
use Google\Service\Calendar;
use Carbon\Carbon;

class GoogleCalendarController extends Controller
{

    public function create()
    {
        $client = new Client();
        $client->setAccessToken(json_decode(auth()->user()->google_token, true));

        // Token süresi dolduysa otomatik yenile
        if ($client->isAccessTokenExpired()) {
            $client->fetchAccessTokenWithRefreshToken(
                $client->getRefreshToken()
            );

            auth()->user()->update([
                'google_token' => json_encode($client->getAccessToken())
            ]);
        }

        $service = new Calendar($client);
        $calendarList = $service->calendarList->listCalendarList();

        return view('teacher.calendar-form', [
            'calendars' => $calendarList->getItems()
        ]);
    }
    

    public function redirect()
    {
        $client = new Client();
        $client->setClientId(config('services.google.client_id'));
        $client->setClientSecret(config('services.google.client_secret'));
        $client->setRedirectUri(config('services.google.redirect'));
        $client->setScopes(['https://www.googleapis.com/auth/calendar']);
        $client->setAccessType('offline');
        $client->setPrompt('consent');

        return redirect($client->createAuthUrl());
    }

    public function callback(Request $request)
    {
        $client = new Client();
        $client->setClientId(config('services.google.client_id'));
        $client->setClientSecret(config('services.google.client_secret'));
        $client->setRedirectUri(config('services.google.redirect'));

        $token = $client->fetchAccessTokenWithAuthCode($request->code);

        auth('teacher')->user()->update([
            'google_token' => json_encode($token)
        ]);

        return redirect()->route('calendar.form')->with('success', 'Google bağlandı ✅');
    }

    

    public function store(Request $request)
    {
        $request->validate([
            'calendar_id' => 'required',
            'title' => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);

        $teacher = auth('teacher')->user();

        if (!$teacher->google_token) {
            return redirect()->route('google.connect')
                ->with('error', 'Önce Google hesabınızı bağlayın.');
        }

        $client = new Client();
        $client->setAccessToken(json_decode(auth()->user()->google_token, true));

        if ($client->isAccessTokenExpired()) {
            $client->fetchAccessTokenWithRefreshToken(
                $client->getRefreshToken()
            );

            auth()->user()->update([
                'google_token' => json_encode($client->getAccessToken())
            ]);
        }

        $service = new Calendar($client);

        $event = new \Google\Service\Calendar\Event([
            'summary' => $request->title,
            'description' => $request->description,
            'start' => [
                'dateTime' => Carbon::parse($request->start)->toRfc3339String(),
                'timeZone' => 'Europe/Istanbul',
            ],
            'end' => [
                'dateTime' => Carbon::parse($request->end)->toRfc3339String(),
                'timeZone' => 'Europe/Istanbul',
            ],
        ]);

        $service->events->insert(
            $request->calendar_id,
            $event
        );

        return back()->with('success', 'Etkinlik seçilen takvime eklendi ✅');
    }




}
