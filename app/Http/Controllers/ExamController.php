<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Exam;
use App\Models\ExamStudent;
use App\Models\ExamApplication;
use App\Models\ExamQuestion;
use App\Models\Student;


class ExamController extends Controller
{

    public function index($id){

        $exam = Exam::find($id);
        //dd($exam);
        $examQuestions = ExamQuestion::where('exam_id', $id);

        return view('exam.index', compact('exam', 'examQuestions'));
    }


    // submit exam answers
    public function submitAnswers(Request $request, $exam_id){

        $examStudent = new ExamStudent();
        $examStudent->exam_id = $exam_id;
        $examStudent->student_id = $request->student_id;
        $examStudent->answers = $request->answers;
        $examStudent->save();        

        return response()->json(['message' => 'Answers submitted successfully']);
    }

    // show examp application form
    public function showApplicationForm($exam_id){

        $exam = Exam::find($exam_id);
        //dd($exam);
        return view('exam.application_form', compact('exam'));
    }

    // submit exam application
    public function submitApplication(Request $request, $exam_id){

        try {

            $request->validate([
                'full_name' => 'required',
                'parent_full_name' => 'required',
                'phone' => 'required|unique:exam_application,phone',
                'grade' => 'required',
            ]);



            $exam = Exam::find($exam_id);

            // Save application data
            $examApplication = new ExamApplication();
            $examApplication->exam_id = $exam_id;
            $examApplication->full_name = $request->full_name;
            $examApplication->parent_full_name = $request->parent_full_name;
            $examApplication->phone = $request->phone;
            $examApplication->grade = $request->grade;
            $examApplication->save();

            return redirect()->route('exam.apply', ['exam_id' => $exam_id])->with('success', 'Sınav başvurunuz başarıyla alındı!');
        } catch (\Exception $e) {
            //dd($e->getMessage());
            if($e->getMessage() == 'The phone has already been taken.'){
                return redirect()->back()->with('error', 'Bu telefon numarası ile daha önce başvuru yapılmıştır.');
            }
            return redirect()->back()->with('error', 'Sınav başvurusu sırasında bir hata oluştu.');
        }

    }

}