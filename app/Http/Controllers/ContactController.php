<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{

    public function index()
    {
        return view('ui.contact');

    }
    public function store()
    {
        $data=array();
        $data['errors']=[];
        $data['success']=0;
        $rules=[
            'fullname'=>'required' ,
            'email'=>'required' ,
            'subject'=>'required' ,
            'message'=>'required|min:3|max:2000'
        ];

        $validated=Validator::make(\request()->all(),$rules);
        if ($validated->fails()){
            $data['errors']['fullname']=$validated->errors()->first('fullname');
            $data['errors']['email']=$validated->errors()->first('email');
            $data['errors']['subject']=$validated->errors()->first('subject');
            $data['errors']['message']=$validated->errors()->first('message');

        }else {
            $attributes=$validated->validated();
            Contact::create($attributes);

            $data = [
                'name' => $attributes['fullname'],
                'email' => $attributes['email'],
                'subject' => $attributes['subject'],
                'body'=>$attributes['message'],
            ];
            $subject=$attributes['subject'];
            $v_email = $attributes['email'];
            $v_name =  $attributes['fullname'];
            $admin_email='info@ukatesh.org';
            $appName=env('APP_NAME');

            if(Mail::send('emails.contact-template', $data, function ($message) use ($admin_email, $appName,$subject,$v_email,$v_name) {
                $message->to($admin_email, $appName)
                    ->cc('kanyiktesh@ukatesh.org')
                    ->cc('pierrekanyik@ukatesh.org')
                    ->from(env('MAIL_USERNAME'), $appName)
                    ->subject($subject)
                    ->replyTo($v_email, $v_name);
            })){

            }else{
                return response()->Fail('Désolé! Veuillez rééssayer plus tard');
            }

            $data['success']=1;
            $data['message']='Mail bien réçu, nous vous répondons le plus vite possible.';
        }
        return response()->json($data);
    }

}
