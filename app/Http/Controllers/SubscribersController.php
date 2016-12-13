<?php

namespace Blogger\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redis;

use Blogger\jobs\NewsletterSubsription;

use Blogger\Http\Requests;

use Blogger\Subscriber;

use Mail;

use LRedis;

use Queue;

use Validator;

class SubscribersController extends Controller
{
    
    public function store(Request $request)
    {
        LRedis::Connection();

        $input = ['email' => $request->input('email')];

        $validator = Validator::make($request->all(), ['email' => 'required|email|max:255']);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $subscriber = new Subscriber;

            dispatch(new NewsletterSubsription($subscriber) );
        }

        return redirect()->back();

        /*$subscriber = $this->validate($request, ['email' => 'required|email|max:255']);*/

        /*$subscribers = new Subscriber;

        $subscribers->email = $request->email;

        $subscribers->save();


        return redirect()->back();*/

        /*$input = ['email' => $request->input('email')];*/

        /*$validate = $this->validate($input);

        if($validate->fails()){
            return view('pages.welcome')->with('error', 'invalid email');
        }*/

        /*$validator = Validator::make($request->all(), ['email' => 'required|email|max:255']);

        if ($validator->fails()){
            dd('failed');
        } else {
            Subscriber::create($input);
        }

        return redirect()->back();*/


        	/*if (!$validation){
        		return $validation->errors()->first();
        	} else {
        		$create = Subcriber::create(['email' => Input::get('email')]);

        		// If successful, we will be returning the '1', so the form understands its successfull
        		//Or if we encountered an unsuccessfull creation attempt, return its info.

        		return $create?'1':'We could not save yor address to our system, please try again later';
        	} else {
        	return redirect()->back();
        }
    }*/
	}

    /*public function queuedMessage()
    {
    
        $mail = queue::later(5, 'emails.queued_email', ["name" => "Henry"], function($message)
            {
                $message->to('henimastic@yahoo.com', 'Henry')->subject('Welcome!');
            });

        if ($mail){ return 'email will be sent in 5 seconds'; }
    }*/
 
}
