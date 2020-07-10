<?php

namespace App\Http\Controllers;

use App\Http\Requests\StepStoreRequest;
use App\Http\Requests\StepUpdateRequest;
use App\Step;
use Illuminate\Http\Request;

class StepController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $steps = Step::all();

        return view('step.index', compact('steps'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('step.create');
    }

    /**
     * @param \App\Http\Requests\StepStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StepStoreRequest $request)
    {
        $step = Step::create($request->all());

        $request->session()->flash('step.id', $step->id);

        return redirect()->route('step.index');
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
