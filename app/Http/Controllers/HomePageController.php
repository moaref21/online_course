<?php

namespace App\Http\Controllers;

use App\Models\Benefit;
use App\Models\Course;
use App\Models\Image;
use App\Models\Test;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
       
        $courses=Course::with('images')->paginate(6);
        return view('home',compact('courses'));
    }

    public function benefit()
    {
        
        $benefites=Benefit::paginate(4);
        return view('home',compact('benefites'));
    }

    public function testimonials()
    {
        
        $testimonials=Test::paginate(6);
        return view('home',compact('testimonials'));
    }
}
