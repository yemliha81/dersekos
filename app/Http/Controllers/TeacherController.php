<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Language;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Google\Client;


class TeacherController extends Controller
{

    public function dashboard()
    {

       /* dd(auth('teacher')->user()->google_token);


        $client = new Client();
        $client->setAccessToken(
            json_decode(auth('teacher')->user()->google_token, true)
        );


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
        $calendarList = $service->calendarList->listCalendarList();*/

        return view('teacher.dashboard'/*, ['calendars' => $calendarList->getItems()]*/);
    }




































    public function showLoginForm()
    {
        
        return view('teacher.login');
    }

     public function login(Request $request)
    {
        //dd($request->all());
        try {
           
        // Validate the login form data
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Attempt to log the user in
        if (auth('teacher')->attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('teacher.dashboard');
        }

        // Authentication failed...
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

        
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function signup(Request $request)
    {
        //dd($request->all());
        try {
       
            // ✅ Validate input
            $request->validate([
                'name'     => 'required|string|max:255',
                'email'    => 'required|email|unique:teacher',
                'password' => 'required|string|min:6',
                'branch'    => 'required|string|max:50',
            ]);

            // ✅ Create teacher
            $teacher = Teacher::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => bcrypt($request->password),
                'branch'    => $request->branch,
            ]);

            // ✅ Log them in using teacher guard
            Auth::guard('teacher')->login($teacher);

            return redirect()->route('teacher.dashboard');
        
         } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
    public function logout()
    {
        auth('teacher')->logout();
        return redirect('/ogretmen/giris');
    }
}
