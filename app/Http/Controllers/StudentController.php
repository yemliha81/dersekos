<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Language;
use App\Models\Event;
use Illuminate\Support\Facades\DB;


class StudentController extends Controller
{
    public function dashboard()
    {
        $teachers = Teacher::orderByRaw("
            CASE 
                WHEN image IS NULL OR image = '' THEN 1 
                ELSE 0 
            END
        ")->get();
        $lessons = Event::with('teacher')->where('is_free', 1)->orderBy('start')->get();

        $paidLessons = Event::where('is_free', false)->with('teacher')->orderBy('start')->get();

        $myLessons = [];
        foreach ($lessons as $lesson) {
            $attendees = $lesson->attendees ? explode(',', $lesson->attendees) : [];
            if (in_array(auth('student')->user()->id, $attendees)) {
                $myLessons[] = $lesson;
            }
        }

        //dd($myLessons);

        //$paidLessons = Event::where('is_free', false)->with('teacher')->get();
        //dd($freeLessons);
        return view('student.dashboard', compact('teachers', 'lessons', 'myLessons', 'paidLessons'));
    }

    public function joinToEvent($id)
    {
        $event = Event::findOrFail($id);
        $student_id = auth('student')->user()->id;
        $attendees = $event->attendees ? explode(',', $event->attendees) : [];
        if(in_array($student_id, $attendees)) {
            // Student already joined
            return redirect()->back();
        }
        $attendees[] = $student_id;
        $event->attendees = implode(',', $attendees);
        $event->save();
        return redirect()->back();
    }

    
}
