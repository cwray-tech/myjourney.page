<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserJourneyController extends Controller
{
    public function index(User $user)
    {
        $journeys = $user->journeys;
        return view('.user_journey.index', compact('journeys'));
    }
}
