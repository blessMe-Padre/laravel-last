<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function send_email()
    {
        return view('mail');
    }
    public function send_email_post(Request $request)
    {
        dd($request);
    }
}
