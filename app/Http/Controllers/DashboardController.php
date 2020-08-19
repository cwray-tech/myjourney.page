<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user= Auth::user();
        $journeys = $user->journeys()->latest()->take(5)->get();
        return view('dashboard.index', compact('user','journeys'));
    }

    public function edit()
    {
        $user= auth()->user();
        return view('.dashboard.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required']);

        $user = auth()->user();

        $user->update([
            'email' => $request->email,
            'name' => $request->name]);
        return back()->with('status', 'Great work! We\'ve updated your info!');
    }
}
