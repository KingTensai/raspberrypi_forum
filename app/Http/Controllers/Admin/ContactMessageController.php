<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactReplyMail;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::latest()->paginate(10);
        return view('admin.contact_messages.index', compact('messages'));
    }

    public function show(ContactMessage $contactMessage)
    {
        return view('admin.contact_messages.show', compact('contactMessage'));
    }

    public function update(Request $request, ContactMessage $contactMessage)
    {
        $request->validate([
            'reply' => 'required|string',
        ]);

        $contactMessage->update([
            'reply' => $request->reply,
            'replied_by' => Auth::id(),
        ]);

        // Send reply email to user
        Mail::to($contactMessage->email)->send(new ContactReplyMail($contactMessage));

        return redirect()->route('admin.contact-messages.index')
            ->with('success', 'Reply sent!');
    }
}
