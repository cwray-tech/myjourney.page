<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageStoreRequest;
use App\Http\Requests\PageUpdateRequest;
use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pages = Page::all();

        return view('page.index', compact('pages'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('page.create');
    }

    /**
     * @param \App\Http\Requests\PageStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageStoreRequest $request)
    {
        $page = Page::create($request->all());

        $request->session()->flash('page.id', $page->id);

        return redirect()->route('page.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Page $page
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Page $page)
    {
        return view('page.show', compact('page'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Page $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Page $page)
    {
        return view('page.edit', compact('page'));
    }

    /**
     * @param \App\Http\Requests\PageUpdateRequest $request
     * @param \App\Page $page
     * @return \Illuminate\Http\Response
     */
    public function update(PageUpdateRequest $request, Page $page)
    {
        $page->update([]);

        $request->session()->flash('page.id', $page->id);

        return redirect()->route('page.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Page $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Page $page)
    {
        $page->delete();

        return redirect()->route('page.index');
    }
}
