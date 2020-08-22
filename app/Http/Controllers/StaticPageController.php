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
        return view('static_pages.index');
    }

    public function about()
    {
        return view('static_pages.about');
    }
    public function privacy()
    {
        return view('static_pages.privacy');
    }
    public function terms()
    {
        return view('static_pages.terms');
    }
}
