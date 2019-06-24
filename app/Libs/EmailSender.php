<?php 

namespace App\Libs;

use Mail;

class EmailSender
{
	public static function send($data, $template, $subject, $to_email, $to_name){
        Mail::send($template, $data, function($message) use ($to_name, $to_email, $subject) {

            $message->to($to_email, $to_name)

            ->subject($subject);

        }); 
        
        if(Mail::failures()){
        	return false;
        }
        return true;        		
	}
}