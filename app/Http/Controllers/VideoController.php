<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class VideoController extends Controller
{

    public function index()
    {
        $videos=Video::all();
       return view('index',compact('videos'));
    }


    public function create()
    {
       return view('create');
    }

    public function store(Request $request)
    {
       
        if ($request->hasFile("video")) {
            $file = $request->file("video");
            $file_name = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path("videos/"), $file_name);

            $video = new Video([
                "name" => $request->name,
                "duration" => $request->duration,
                "video" => $file_name,
                "stage_id" => $request->stage_id,
                "course_id" => $request->course_id,
            ]);
            $video->save();
        }
        return redirect("/");

    }
    public function edit($id)
    {
        $video= Video::findOrFail($id);
     
        return view('edit')->with('video', $video);
    }

    /**image
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    { 
        $video = Video::findOrFail($id);
        if ($request->hasFile("video")) {
            if (File::exists("video/" . $video->video)) {
                File::delete("video/" . $video->video);
            }
            $file = $request->file("video");
            $video->video = time() . "_" . $file->getClientOriginalName();
            $file->move(\public_path("/videos"), $video->video);
            $request['video'] = $video->video;
        }

        $video ->update([
            "name" => $request->name,
            "duration" => $request->duration,
            "video" => $video->video,
            "stage_id" => $request->stage_id,
            "course_id" => $request->course_id,
        ]);
        
    
    return redirect("/");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $video = Video::findOrFail($id);

       
        if (File::exists("video/" . $video->video)) {
            File::delete("video/" . $video->video);
        }
        $video->delete();
       
        return back();
    }

}
