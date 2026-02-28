<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Event;
use App\Models\Teacher;
use App\Models\Language; // Assuming you have a Language model to fetch languages

class LessonController extends Controller
{

    public function index()
    {
        // code to list all lessons where lang is en
        $lessons = Lesson::where('lang', 'tr')->get();
        $languages = Language::all(); // Assuming you have a Language model to fetch languages
        return view('admin.lesson.index', compact('lessons', 'languages'));
    }

    public function create()
    {
        // code to show create lesson form
        $languages = Language::all();
        return view('admin.lesson.create', compact('languages'));
    }

    public function store(Request $request)
    {
        // code to store new lesson

        //dd($request->all());

        if ($request->has('lesson_id')) {
                $lesson_id = $request->lesson_id; // Use the provided lesson_id
            }else{
                $lesson_id = Lesson::max('lesson_id') + 1; // Increment the maximum lesson_id by 1
                if (!$lesson_id) {
                    $lesson_id = 1; // If no lesson items exist, start with 1
                }
            }
        try {

             $languages = Language::all();
            
            //validation
            foreach ($languages as $language) {
                
                    
                    $request->validate([
                        'grade_id' => 'required|integer',
                        'title_' . $language->lang_code => 'required|max:100',
                        'seo_url_' . $language->lang_code => 'required|max:255',
                        'description_' . $language->lang_code => 'required',
                        'seo_title_' . $language->lang_code => 'nullable|max:255',
                        'seo_description_' . $language->lang_code => 'nullable|max:255',
                        'seo_keywords_' . $language->lang_code => 'nullable|max:255',
                    ]);

                $grade_id = $request->input('grade_id');

                Lesson::updateOrCreate(
                    ['lesson_id' => $lesson_id, 'lang' => $language->lang_code],
                    [
                        'grade_id' => $grade_id,
                        'name' => $request->input('title_' . $language->lang_code) ?? $request->input('title_en'),
                        'description' => $request->input('description_' . $language->lang_code) ?? $request->input('description_en'),
                        'seo_url' => $request->input('seo_url_' . $language->lang_code) ?? $request->input('seo_url_en'),
                        'seo_title' => $request->input('seo_title_' . $language->lang_code) ?? $request->input('seo_title_en'),
                        'seo_description' => $request->input('seo_description_' . $language->lang_code) ?? $request->input('seo_description_en'),
                        'seo_keywords' => $request->input('seo_keywords_' . $language->lang_code) ?? $request->input('seo_keywords_en'),
                        'created_at' => date('Y-m-d H:i:s')
                    ]
                );

            }



            return redirect()->route('admin.grade.lessons', ['id' => $grade_id])->with('success', 'Lesson başarıyla kaydedildi.');
        } catch (\Exception $e) {
            throw $e;
           return redirect()->back()->withErrors(['error' => 'Hata oluştu: ' . $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        // code to show edit lesson form
        $lessons = Lesson::where('lesson_id', $id)->get();
        //dd($lessons);
        $languages = Language::all();
        
        return view('admin.lesson.edit', compact('lessons', 'languages'));
    }

    public function destroy($id)
    {
        // code to delete lesson
        Lesson::where('lesson_id', $id)->delete();
        LessonSlider::where('lesson_id', $id)->delete();
        return redirect()->route('admin.lesson')->with('success', 'Lesson başarıyla silindi.');
    }


    public function free_lesson_stats()
    {
        $lessons = [];
        // check if this is a get request
        $request = request();
        if($request->has('start_date') && $request->has('end_date')){
            $request->validate([
                'start_date' => 'required|date',
                'end_date' => 'required|date|after:start_date',
            ]);
            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date');
            // code to show edit lesson form
            $lessons = Event::where('start', '>=', $start_date)->where('end', '<=', $end_date)->where('grade', '<', 9)->get();


            //group these lessons by their teacher_id
            $groupedLessons = [];
            foreach ($lessons as $lesson) {
                $teacher_id = $lesson->teacher_id;
                if (!isset($groupedLessons[$teacher_id])) {
                    $groupedLessons[$teacher_id] = [];
                }
                $groupedLessons[$teacher_id]['lessons'][] = $lesson;
                $groupedLessons[$teacher_id]['teacher'] = Teacher::where('id', $teacher_id)->first();
                $groupedLessons[$teacher_id]['count'] = Event::where('teacher_id', $teacher_id)->where('grade', '<', 9)->where('start', '>=', $start_date)->where('end', '<=', $end_date)->count();
            }

            //dd($groupedLessons);
        }
        
        
        return view('admin.free_lessons.index', compact('groupedLessons'));
    }

}
