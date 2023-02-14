<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Contact;

class ContactUsController extends Controller
{
    public function ContactForm(Request $request){
        return view('shop.contact-us');
    }

    public function ContactFormPost(Request $request){

        // Form validation
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|tel',
         ]);
        //  Store data in database
        Contact::create($request->all());
    
        //  Send mail to admin
        \Mail::send('shop.mail.contact', array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'subject' => $request->get('subject'),
            'user_query' => $request->get('message'),
        ), function($message) use ($request){
            $message->from($request->email);
            $message->to('jeremyhcampbell@gmail.com', 'AdmPL - Contact')->subject($request->get('subject'));
        });

        $notification = array(
            'message' => 'Nous avons reçu votre message et un représentant vous contactera bientôt.',
            'alert-type' => 'success'
        );
        
        return back()->with($notification);
    }
}
