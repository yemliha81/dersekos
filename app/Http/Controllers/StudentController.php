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
        $teachers = Teacher::all();
        $freeLessons = Event::where('is_free', true)->with('teacher')->get();
        //dd($freeLessons);
        return view('student.dashboard', compact('teachers', 'freeLessons'));
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
