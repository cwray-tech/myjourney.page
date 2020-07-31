<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserJourneyController extends Controller
{
    public function index()
    {
        $journeys = Auth::user()->journeys;
        return view('.user_journey.index', compact('journeys'));
    }
}
