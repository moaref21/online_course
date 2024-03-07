<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Stage;
use Illuminate\Http\Request;

class CoursesPageController extends Controller
{
    public function index()
    {
       
        $stages=Stage::all();
        $courses=Course::with('images')->paginate(6);
        return view('home',compact('courses'));
    }

    public function showCourse()
    {
        $stages=Stage::with('videos')->get();
        
        return view('home',compact('stages'));
       
    }
    
}
