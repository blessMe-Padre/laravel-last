<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailFormRequest;
use App\Mail\MailForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send_email()
    {
        return view('mail');
    }
    public function send_email_post(MailFormRequest $request)
    {
        Mail::to('subbotinnd@yandex.ru')->send(new MailForm($request));
        return redirect()->route('send-email')->with('success', 'Письмо успешно отправлено');
    }
}
