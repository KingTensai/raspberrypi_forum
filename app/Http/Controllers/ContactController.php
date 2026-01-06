<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;


class ContactController extends Controller
{
    public function sendmail(Request $request): \Illuminate\Http\RedirectResponse
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
        ContactMessage::create($validated);
        return back()->with('success', 'Message sent!');
    }
    public function show(Request $request): View
    {
        return view('contact.show', [
            'user' => $request->user(),
        ]);
    }


}
