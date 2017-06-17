<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::post('/sendmail',
	function( \Illuminate\Http\Request $request, 
	\Illuminate\Mail\Mailer $mailer ) {
    
       $mailer->to( 'bsal.gautam16@gmail.com' )
              ->send( new \App\Mail\emails(

              		  $request->input('name'),
              		  $request->input('subject'),
              		  $request->input('message'),
              		  $request->input('email')

              	     ) );

         Session::flash('success', "Your message is received. Thanks");
         return Redirect::back()->with('message','Operation Successful !');
	}

)->name('sendmail');
