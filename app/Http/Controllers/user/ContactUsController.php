<?php

namespace App\Http\Controllers\user;

use App\Models\Message;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function sendMail(Request $request)
    {
        $request->validate([
            'contact_name' => 'required|string|max:255',
            'contact_phone' => 'required|string|max:20',
            'contact_email' => 'required|email|max:255',
            'contact_message' => 'required|string',
        ]);

        $name = strip_tags(trim($request->input('contact_name')));
        $phone = strip_tags(trim($request->input('contact_phone')));
        $name = str_replace(array("\r", "\n"), array(" ", " "), $name);
        $email = filter_var(trim($request->input('contact_email')), FILTER_SANITIZE_EMAIL);
        $messageContent = trim($request->input('contact_message'));

        if (empty($name) || empty($messageContent) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return response()->json(['message' => 'Please complete the form and try again.'], 400);
        }

        $recipient = "naseralzaghari90@gmail.com"; // Update this to your desired email address

        try {
            Mail::to($recipient)->send(new ContactMail($name, $email, $phone, $messageContent));
            Message::create([
                'name' => $request->contact_name,
                'email' => $request->contact_email,
                'phone_number' => $request->contact_phone,
                'message' => $request->contact_message,
            ]);
            return response()->json(['message' => 'Thank You! Your message has been sent.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Oops! Something went wrong and we couldn\'t send your message.'], 500);
        }
    }
}
