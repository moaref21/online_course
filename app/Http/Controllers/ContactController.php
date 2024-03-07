<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact(){
        return view('contact');
    }


    public function send_contact(Request $request){
        $details=[

            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'number' => $request->number,
            'subject' => $request->subject,
            'message' => $request->message,
        ];
        Mail::to('anas@gmail.com')->send(new ContactMail($details));
        return back()->with('success','Your message has been sent successfully');

    }
}
