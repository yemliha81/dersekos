<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Event;
use Carbon\Carbon;


class EventsController extends Controller
{

    public function index(){
        $teacherId = auth('teacher')->user()->id;

        return Event::where('teacher_id', $teacherId)->get();
    }

    public function store (Request $request) {
        //dd($request->all());
        $teacherId = auth('teacher')->user()->id;

        $event = Event::updateOrCreate(
            ['id'         => $request->event_id],
            [
            'title'      => $request->title,
            'start'      => Carbon::parse($request->start)->format('Y-m-d H:i:s'),
            'end'        => Carbon::parse($request->end)->format('Y-m-d H:i:s'),
            'meet_url'   => $request->meet_url,
            'is_free'    => $request->is_free,
            'price'      => $request->price,
            'min_person' => $request->min_person,
            'max_person' => $request->max_person,
            'teacher_id' => $teacherId,
        ]);

        return response()->json($event);
    }

    public function update (Request $request) {
        //dd($request->all());
        $teacherId = auth('teacher')->user()->id;

        $event = Event::updateOrCreate(
            ['id'         => $request->event_id],
            [
            'title'      => $request->title,
            'start'      => Carbon::parse($request->start)->format('Y-m-d H:i:s'),
            'end'        => Carbon::parse($request->end)->format('Y-m-d H:i:s'),
            'meet_url'   => $request->meet_url,
            'is_free'    => $request->is_free,
            'price'      => $request->price,
            'min_person' => $request->min_person,
            'max_person' => $request->max_person,
            'teacher_id' => $teacherId,
        ]);

        return back()->with('success', 'Etkinlik başarıyla güncellendi.');
    }

}