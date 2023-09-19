<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    public function showForm()
    {
        return view('pages.contact');
    }

    public function sendEmail(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $message= $request->input('message');

        $details=[
            'name'=>$request->name,
            'email'=>$request->email,
            'message'=>$request->message,
        ];
        Config::set('mail.from.address', $email);
        Config::set('mail.from.name', $name);


        try {
             Mail::send('pages.contact', $details, function ($message) use ($email, $request) {
                $message->to('laravel513@gmail.com');
                $message->from(config('mail.from.address'), config('mail.from.name'));


                $message->to('laravel513@gmail.com');
            });

            return redirect()->back()->with('success', 'Mail başarıyla gönderildi. En kısa zamanda yanıtlanacak:).');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Mail gönderilirken bir hata oluştu: ' . $e->getMessage());
        }

    }
}
