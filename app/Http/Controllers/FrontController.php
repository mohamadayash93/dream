<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;


class FrontController extends Controller
{
    public function index()
    {
        return view('front.index');
    }

   public function menu(){
        return view('front.menu');
   }

   public function city(){
        return view('front.city');
   }

   public function contact(){
        return view('front.contact');
   }

   public function blog($id){
        $blog = Blog::find($id);
        return view('front.blog', compact('blog'));
   }


    public function sendContactMessage(Request $request){

        Mail::to($request->email)->send(new SendEmail('شكراً لتواصلكم معنا', 'جولدن ايكون كافيه تشكركم على رسالتكم
        سيتم التواصل معكم قريباً'));
        Mail::to('mail@mail.com')->send(new SendEmail('From Contact Form From Website', $request->name. ' With Email : '. $request->email. ' With Phone : '. $request->phone.' Write The Follwing Text : '.$request->msg));
        return redirect()->back()->with('success', 'ss');
    }
}
