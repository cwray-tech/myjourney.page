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
     * @return \Illuminate\Http\Response
     */
    public function store(StepStoreRequest $request, Journey $journey)
    {
        $step = Step::create([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'user_id' => auth()->id(),
            'journey_id' => $journey->id
        ]);

        $request->session()->flash('step.id', $step->id);

        return redirect()->route('journeys.steps.index', $journey->id);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Step $step
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Step $step)
    {
        return view('step.show', compact('step'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Step $step
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Step $step)
    {
        return view('step.edit', compact('step'));
    }

    /**
     * @param \App\Http\Requests\StepUpdateRequest $request
     * @param \App\Step $step
     * @return \Illuminate\Http\Response
     */
    public function update(StepUpdateRequest $request, Step $step)
    {
        $step->update([]);

        $request->session()->flash('step.id', $step->id);

        return redirect()->route('step.index');
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
