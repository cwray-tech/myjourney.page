<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Newsletter;

class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        $user = auth()->user();

        Newsletter::subscribeOrUpdate($user->email);

        $user->update(['is_subscribed' => true]);

        return redirect()->back()->with('status', 'Great! You are subscribed to receive updates now.');
    }


    public function destroy(Request $request)
    {
        $user = auth()->user();

        Newsletter::unsubscribe($user->email);

        $user->update(['is_subscribed' => false]);

        return redirect()->back()->with('status', 'You are now unsubscribed from updates.');
    }
}
