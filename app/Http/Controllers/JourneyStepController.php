<?php

namespace App\Http\Controllers;

use App\Http\Requests\StepStoreRequest;
use App\Http\Requests\StepUpdateRequest;
use App\Journey;
use App\Step;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JourneyStepController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $steps = Step::all();

        return view('step.index', compact('steps'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request, Journey $journey)
    {
        $this->authorize('update', $journey);
        return view('step.create', compact('journey'));
    }

    /**
     * @param \App\Http\Requests\StepStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StepStoreRequest $request, Journey $journey)
    {
        $this->authorize('update', $journey);
        $step = Step::create([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'time' => $request->time,
            'user_id' => auth()->id(),
            'journey_id' => $journey->id
        ]);
        if($request->picture) {
            $step->update([
                'picture' => $request->file('picture')->store('journey-images', 'public'),
            ]);
        }

        $request->session()->flash('step.id', $step->id);

        return redirect()->route('journeys.steps.create', $journey->slug)->with('status', 'Sweet! You successfully added a step! Want to add another?');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Step $step
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, Step $step)
    {
        return view('step.show', compact('step'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Step $step
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request, Step $step)
    {
        $this->authorize('update', $step);
        return view('step.edit', [
            'step' => $step,
            'journey' => $step->journey
        ]);
    }

    /**
     * @param \App\Http\Requests\StepUpdateRequest $request
     * @param \App\Step $step
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StepUpdateRequest $request, Step $step)
    {
        $this->authorize('update', $step);

        $step->update([
            'title' =>  $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'time' => $request->time
        ]);
        if($request->picture) {
            $step->update([
                'picture' => $request->file('picture')->store('journey-images', 'public'),
            ]);
        }
        return redirect()->route('steps.edit', $step->id)->with('status', 'Great job! You updated this step along your journey.');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Step $step
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, Step $step)
    {
        $this->authorize('update', $step);
        Storage::disk('public')->delete($step->picture);
        $step->delete();

        return redirect()->route('journeys.edit', $step->journey->slug)->with('status', 'Step was deleted.');
    }
}
