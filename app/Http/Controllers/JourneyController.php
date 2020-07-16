<?php

namespace App\Http\Controllers;

use App\Http\Requests\JourneyStoreRequest;
use App\Http\Requests\JourneyUpdateRequest;
use App\Journey;
use Illuminate\Http\Request;

class JourneyController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $journeys = Journey::where('is_public', true)->get();

        return view('journey.index', compact('journeys'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        return view('journey.create');
    }

    /**
     * @param \App\Http\Requests\JourneyStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(JourneyStoreRequest $request)
    {
        $journey = Journey::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'introduction' => $request->introduction,
        ]);

        $request->session()->flash('journey.id', $journey->id);

        return redirect()->route('journeys.edit', ['journey'=> $journey->slug])->with('status', 'Great Work! You just created a journey! Now, add the steps that were a part of your journey.');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Journey $journey
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, Journey $journey)
    {
        return view('journey.show', compact('journey'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Journey $journey
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request, Journey $journey)
    {
        return view('journey.edit', compact('journey'));
    }

    /**
     * @param \App\Http\Requests\JourneyUpdateRequest $request
     * @param \App\Journey $journey
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(JourneyUpdateRequest $request, Journey $journey)
    {
        $journey->update([
            'title' => $request->title,
            'introduction' => $request->introduction
        ]);

        $request->session()->flash('journey.id', $journey->id);

        return redirect()->route('journeys.edit', $journey->slug);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Journey $journey
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, Journey $journey)
    {
        $journey->delete();

        return redirect()->route('journeys.index');
    }
}
