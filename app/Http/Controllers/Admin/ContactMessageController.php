<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactReplyMail;
use Illuminate\Support\Facades\View;

class ContactMessageController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $messages = ContactMessage::latest()->paginate(10);
        return view('admin.show-message', compact('messages'));
    }

    public function show(ContactMessage $message)
    {
        return view('admin.single-message', compact('message'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'reply_message' => 'required|string',
        ]);

        $message = ContactMessage::findOrFail($id);

        $message->update([
            'reply' => $request->reply_message,
            'replied_at' => now(),
        ]);

        Mail::to($message->email)->send(new ContactReplyMail($message));

        return back()->with('success', 'Answer sent to ' . $message->email);
    }
}
