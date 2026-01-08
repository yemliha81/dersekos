<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\EventRate;
use App\Models\Student;
use App\Models\Language;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Google\Client;


class TeacherController extends Controller
{

    public function dashboard()
    {
        return view('teacher.dashboard'/*, ['calendars' => $calendarList->getItems()]*/);
    }

    public function listTeachers()
    {
        $teachers = Teacher::all();
        return view('teacher.list', ['teachers' => $teachers]);
    }

    public function viewProfile($id)
    {
        $teacher = Teacher::findOrFail($id);

        $meta_title = "Öğretmen Profili - " . $teacher->name . ", ".$teacher->branch;
        $meta_description = "Dersekos öğretmen profili. " . $teacher->name . " " . strip_tags($teacher->about);
        
        return view('teacher.profile', compact('teacher', 'meta_title', 'meta_description'));
    }

    public function publicProfile($id)
    {
        $teacher = Teacher::with('events')->findOrFail($id);
        $reviews = EventRate::where('teacher_id', $id)->with('student')->get();

        $meta_title = "Öğretmen Profili - " . $teacher->name . ", ".$teacher->branch;
        $meta_description = "Dersekos öğretmen profili. " . $teacher->name . " " . strip_tags($teacher->about);
        //dd($rates);
        //dd($teacher);
        return view('teacher', compact('teacher', 'reviews', 'meta_title', 'meta_description'));
    }

    public function updateProfile(Request $request)
    {
        try {
            //code...
        
            $teacher = auth('teacher')->user();



            //dd($request->all());

            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:teacher,email,'.$teacher->id,
                'phone' => 'required|string|max:20',
                'branch' => 'required|string|max:100',
            ]);

            if($request->has('image')){

                $imagePath = $request->file('image')->move(public_path('teacher_images'), uniqid().'.jpg');
                $teacher->image = 'teacher_images/' . basename($imagePath);

            }

            $teacher->name = $request->input('name');
            $teacher->email = $request->input('email');
            $teacher->phone = $request->input('phone');
            $teacher->branch = $request->input('branch');
            $teacher->experience = $request->input('experience');
            $teacher->certificates = $request->input('certificates');
            $teacher->tags = $request->input('tags');
            $teacher->about = $request->input('about');

            if ($request->filled('password')) {
                $teacher->password = bcrypt($request->input('password'));
            }

            $teacher->save();

            return redirect()->back()->with('success', 'Profil başarıyla güncellendi.');

        } catch (\Throwable $th) {
            throw $th;
        }
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
                'phone'    => 'required|string|max:20',
                'password' => 'required|string|min:6',
                'branch'    => 'required|string|max:50',
            ]);

            $ip = $request->ip();

            // ✅ Create teacher
            $teacher = Teacher::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'phone'    => $request->phone,
                'password' => bcrypt($request->password),
                'branch'    => $request->branch,
                'status' => '0',
                'address' => $ip

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
