<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tests=Test::all();
        return view('index',compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile("image")) {
            $file = $request->file("image");
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path("image/"), $imageName);

            $test = new Test([
                "name" => $request->name,
                "story" => $request->story,
                "image" => $imageName,
            ]);
            $test->save();
            
        }
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $test = Test::findOrFail($id);

        return view('edit')->with('test', $test);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $test = Test::findOrFail($id);
        if ($request->hasFile("image")) {
            if (File::exists("image/" . $test->image)) {
                File::delete("image/" . $test->image);
            }
            $file = $request->file("image");
            $test->video = time() . "_" . $file->getClientOriginalName();
            $file->move(\public_path("/image"), $test->image);
            $request['image'] = $test->image;
        }
        $test ->update([
            "name" => $request->name,
            "story" => $request->story,
            "image" => $test->image,
        ]);
      
        
    
    return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $test = Test::findOrFail($id);
        $test->delete();
    }
}
