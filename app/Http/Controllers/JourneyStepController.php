<?php

namespace App\Http\Controllers;

use App\Http\Requests\StepStoreRequest;
use App\Http\Requests\StepUpdateRequest;
use App\Journey;
use App\Step;
use Illuminate\Http\Request;

class JourneyStepController extends Controller
{
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
        return view('step.create', compact('journey'));
    }

    /**
     * @param \App\Http\Requests\StepStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StepStoreRequest $request, Journey $journey)
    {
        $step = Step::create([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'time' => $request->time,
            'user_id' => auth()->id(),
            'journey_id' => $journey->id
        ]);

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
        $step->update([
            'title' =>  $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'time' => $request->time
        ]);

        $request->session()->flash('step.id', $step->id);

        return redirect()->route('steps.edit', $step->id)->with('status', 'Great job! You updated this step along your journey.');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Step $step
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Step $step)
    {
        $step->delete();

        return redirect()->route('step.index');
    }
}
