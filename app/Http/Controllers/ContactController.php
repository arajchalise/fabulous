<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Auth;

class ContactController extends Controller
{

    public function index()
    {
        if (Auth::check()) {
            $contacts = Contact::all();
            return view('Contact.index', ['contacts' => $contacts]);
        }
    }

    public function store(Request $request)
    {
        if( Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'company' => $request->company,
            'message' => $request->message,
            'status' => 0
        ])){
            $request->session()->put('message', 'Your Request has been sent to the respective person, We will get you soon');
            return redirect()->route('contact');
        }
    }

    public function sendEmail(Request $request, Contact $contact)
    {
        $receiver = Contact::find($contact->id);
        //return $receiver;
        $to = $receiver->email;
        $headers = "From: contact@fabulous.com";
        $subject = "Re: ".$receiver->subject;
        $msg = "";
        $msg = "Dear ".$receiver->name.", \n";
        $msg.= $request->txt;
        return $msg;
       if( mail($to,$subject,$msg,$headers)){
            Contact::where('id', $receiver->id)->update([
                'status' => 1
            ]);
            return redirect()->route('getContacts');
       }
       return "Error Sending message";
    }
}
