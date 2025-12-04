<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Language;
use Illuminate\Support\Facades\DB;


class StudentController extends Controller
{
    public function dashboard()
    {
        
        return view('student.dashboard');
    }

    
}
