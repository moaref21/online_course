<?php

namespace App\Http\Controllers;

use App\Models\Benefit;
use Illuminate\Http\Request;

class BenefitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
     public function index()
     {
         return view('cr');
     }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cr');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $benefit = new Benefit([
            "title" => $request->title,
            "body" => $request->body, 
        ]);
        $benefit->save();
        return redirect('/');

    }

    /**
     * Display the specified resource.
     */
    public function show(Benefit $benefit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $benefit = Benefit::findOrFail($id);
        return view('edit')->with('benefit', $benefit);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $benefit = Benefit::findOrFail($id);

        $benefit ->update([
            "title" => $request->title,
            "body" => $request->body, 
        ]);
     
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $benefit = Benefit::findOrFail($id);
        $benefit->delete();
    }
}
