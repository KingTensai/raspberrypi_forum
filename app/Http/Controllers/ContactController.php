<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;


class ContactController extends Controller
{
    public function sendmail(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string',
            'email'   => 'required|email',
            'message' => 'required|string',
        ]);

        Mail::to(config('mail.from.address'))
            ->send(new ContactMail(
                $validated['name'],
                $validated['email'],
                $validated['message']
            ));
        return back()->with('success', 'Message sent!');
    }
    public function show(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }


}
