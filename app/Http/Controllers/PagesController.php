<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use App\Post;
use App\User;
use App\Contact;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
   

    
    public function getIndex()
    {
        $posts = Post::orderBy('created_at','desc')->simplePaginate(5);
        return view('pages.welcome',compact('posts'));
        //dd($posts);
    }

    public function setprofile(Request $request)
    {   


        $user = Auth::user()->avatar;
          
         if($request->hasFile('avatar'))
            {
             // get previous image from folder
             $filename = public_path('uploads/avatar/'.$user); 

             if (($filename)) 
             { 
              // unlink or remove previous image from folder
                unlink($filename);
             }

            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(200, 200)->save( public_path('/uploads/avatar/' . $filename ) );

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
         

         return view('pages.profile',compact('user'));
   
      
  }

      public function getAbout()
    {
        return view('pages.about');
    }


      public function getContact()
    {
        return view('pages.contact');
    }

    public function getProfile()
    {
        return view('pages.profile');
    }

    public function postContact(Request $request)  
    {
        //Validate input
        $this->validate($request,[
            'email' => 'required',
            'subject' => 'required', 
            'message' => 'required'
        ]);

          // Storing data
           $contact = Contact::create($request->all());

            // Mail delivery logic goes here
             //$data = ['contact'=> $contact];
               
            // Mail::send('email.index',$data, function ($message) {
            // $message->from('vladimirbajic5@gmail.com', 'Learning Blog Laravel 5.5');
            // $message->to('vladimirbajic5@gmail.com')->subject(' There is new message');

            // });
            //---SEND MAIL TO ME

             Mail::to('vladimirbajic5@gmail.com')->send(new \App\Mail\MyMail($contact));

             //--- SEND MAIL TO USER
             
             Mail::to($contact->email)->send(new \App\Mail\NewMail($contact)); 


            return back()->with('success',' Your message ' .$contact->email. ' has been sent!!!');
        
    }

   
  
}