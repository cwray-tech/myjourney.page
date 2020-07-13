<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $user= auth()->user();
        return view('dashboard.index', compact('user'));
    }

    public function edit()
    {
        $user= auth()->user();
        return view('.dashboard.edit', compact('user'));
    }
}
