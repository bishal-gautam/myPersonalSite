<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Mail;

use App\Mail\emails;

class HomeController extends Controller
{
    /*
    public fuction SendFeedbackMail()
    {
    	$to_email = 'bishal@devskill.com';
        Mail::to($to_email)->send(new FeedbackMail);
        return "E-mail has been sent Successfully"; 
    }

    public function postContact(Request $req)
    {
    	$data =array(
    	   'email'=> $req->email,
    	   'subject'=> $req->subject;
    	    
    	);

    	Mail::send('emails.feedbackinfo', $data, function($msg) use ($data)
        {
            $msg->to('bsal.gautam16@gmail.com');
    	}
    }
    
    public function welcomeMail( )
    {

        $to_email = 'bishal@devskill.com';
        Mail::to($to_email)->send(new FeedbackMail);

        return "E-mail has been sent Successfully"; 
    }
    */

    public function welcomeMail(Request $request)
    {

        $to_email = 'bishal@devskill.com';

        Mail::to($to_email)->send(new emails(

        	          $request->input('name'),
              		  $request->input('subject'),
              		  $request->input('message'),
              		  $request->input('email')

              		  ));

        return "E-mail has been sent Successfully"; 
    }
}
