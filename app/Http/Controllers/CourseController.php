<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Image;
use App\Models\Stage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        return view('index')->with('courses', $courses);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $course = Course::all();

        return view('create')->with('course', $course);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $course = Course::create([
            'name' => $request->input('name'),
            'coach' => $request->input('coach'),
            'description' => $request->input('description'),
            'level' => $request->input('level'),
            'duration' => $request->input('duration'),
        ]);



        if ($request->hasFile("images")) {
            $files = $request->file("images");
            foreach ($files as $file) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $request['course_id'] = $course->id;
                $request['image'] = $imageName;
                $file->move(\public_path("/images"), $imageName);
                Image::create($request->all());
            }
        }

        return redirect("/");
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $courses = Course::findOrFail($id);

        return view('edit')->with('courses', $courses);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $course->update([
            'name' => $request->name,
            'coach' => $request->coach,
            'description' => $request->description,
            'level' => $request->level,
            'duration' => $request->duration
        ]);



        if ($request->hasFile("images")) {
            $files = $request->file("images");
            foreach ($files as $file) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $request['course_id'] = $course->id;
                $request['image'] = $imageName;
                $file->move(\public_path("/images"), $imageName);
                Image::create($request->all());
            }
        }

        return redirect("/");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);


        $images = Image::where("course_id", $course->id)->get();
        foreach ($images as $image) {
            if (File::exists("images/" . $image->image)) {
                File::delete("images/" . $image->image);
            }
        }
        $course->delete();

        return back();
    }

    public function deleteimage($id)
    {
        $images = Image::findOrFail($id);
        if (File::exists("images/" . $images->image)) {
            File::delete("images/" . $images->image);
        }

        Image::find($id)->delete();
        return back();
    }
}
