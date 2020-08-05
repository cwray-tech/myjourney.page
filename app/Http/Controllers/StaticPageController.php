<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('page.index');
    }

    public function about()
    {
        return view('page.about');
    }
    public function privacy()
    {
        return view('page.privacy');
    }
    public function terms()
    {
        return view('page.terms');
    }
}
