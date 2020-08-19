<?php

namespace App\Http\Controllers;

use App\Http\Requests\JourneyStoreRequest;
use App\Http\Requests\JourneyUpdateRequest;
use App\Journey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JourneyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index','show');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $journeys = Journey::where('is_public', true)->where('is_published', true)->orderBy('published_at','desc')->get();

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
        $this->authorize('create', Journey::class);

        $journey = Journey::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'is_anonymous' => $request->is_anonymous == true ? '1' : '0',
            'introduction' => $request->introduction,
        ]);

        if($request->picture) {
            $journey->update([
                'picture' => $request->file('picture')->store('journey-images', 'public'),
            ]);
        }

        return redirect()->route('journeys.steps.create', ['journey'=> $journey->slug])->with('status', 'Great Work! You just created a journey! Now, add the steps that were a part of your journey.');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Journey $journey
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, Journey $journey)
    {
        $this->authorize('view', $journey);
        $steps = $journey->steps()->paginate(10);
        return view('journey.show', ['journey' => $journey, 'steps' => $steps]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Journey $journey
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request, Journey $journey)
    {
        $this->authorize('update', $journey);

        return view('journey.edit', compact('journey'));
    }

    /**
     * @param \App\Http\Requests\JourneyUpdateRequest $request
     * @param \App\Journey $journey
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(JourneyUpdateRequest $request, Journey $journey)
    {
        $this->authorize('update', $journey);
        $journey->update([
            'title' => $request->title,
            'introduction' => $request->introduction,
            'is_anonymous' => $request->is_anonymous == true ? '1' : '0',
        ]);
        if($request->picture) {
            $journey->update([
                'picture' => $request->file('picture')->store('journey-images', 'public'),
            ]);
        }

        return redirect()->route('journeys.edit', $journey->slug)->with('status', 'Your journey was updated!');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Journey $journey
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, Journey $journey)
    {
        $this->authorize('delete', $journey);
        Storage::disk('public')->delete($journey->picture);
        $journey->steps->each(function ($step){
            Storage::disk('public')->delete($step->picture);
        });
        $journey->delete();

        return redirect('/dashboard/journeys')->with('status', 'Journey was successfully deleted.');
    }
}
