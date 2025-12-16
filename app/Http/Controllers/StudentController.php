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

        // cache $teachers for 60 minutes
        $teachers = cache()->remember('teachers', 60, function () {
            return Teacher::orderByRaw("
                CASE 
                    WHEN image IS NULL OR image = '' THEN 1 
                    ELSE 0 
                END
            ")->get();
        });



        $where = // where start >= now
        $lessons = Event::where('is_free', 1)->where('end', '>=', now())->with('teacher')->orderBy('start')->get();

        //$lessons = Event::with('teacher')->where('is_free', 1)->orderBy('start')->get();


        $grades = ['5', '6', '7', '8', '9', '10', '11', '12', '13'];

        // group lessons by grade
       $groupedLessons = [];
        foreach ($grades as $grade) {
            foreach($lessons as $lesson){
                if($lesson->grade == $grade){
                    $groupedLessons[$grade][] = $lesson;

                }
            }
        }

        //dd($groupedLessons);



        $paidLessons = Event::where('is_free', false)->with('teacher')->orderBy('start')->limit(20)->get();

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
        return view('student.dashboard', compact('teachers', 'lessons', 'myLessons', 'paidLessons', 'groupedLessons'));
    }

    public function dashboard2()
    {
        $teachers = Teacher::orderByRaw("
            CASE 
                WHEN image IS NULL OR image = '' THEN 1 
                ELSE 0 
            END
        ")->get();
        $lessons = Event::with('teacher')->where('is_free', 1)->orderBy('start')->get();

        $paidLessons = Event::where('is_free', false)->with('teacher')->orderBy('start')->limit(20)->get();

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
        return view('student.dashboard2', compact('teachers', 'lessons', 'myLessons', 'paidLessons'));
    }

    public function joinToEvent($id)
    {
        $event = Event::findOrFail($id);
        $max_person = $event->max_person;
        $attendees_count = $event->attendees ? count(explode(',', $event->attendees)) : 0;
        
        $student_id = auth('student')->user()->id;
        $attendees = $event->attendees ? explode(',', $event->attendees) : [];
        if(in_array($student_id, $attendees)) {
            // Student already joined
            echo json_encode(['status' => 'already_joined', 'message' => 'You have already joined this event.']);
            return;
        }

        if($attendees_count >= $max_person) {
            echo json_encode(['status' => 'full', 'message' => 'This event is full.']);
            return;
        }
        $attendees[] = $student_id;
        $event->attendees = implode(',', $attendees);
        $event->save();

        echo json_encode(['status' => 'success', 'message' => 'You have joined the event successfully.']);
        return;
    }

    
}
