<?php

namespace App\Http\Controllers;

use App\Http\Requests\StepStoreRequest;
use App\Http\Requests\StepUpdateRequest;
use App\Http\Resources\Step as StepResource;
use App\Http\Resources\StepCollection;
use App\Step;
use Illuminate\Http\Request;

class StepController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\StepCollection
     */
    public function index(Request $request)
    {
        $steps = Step::all();

        return new StepCollection($steps);
    }

    /**
     * @param \App\Http\Requests\StepStoreRequest $request
     * @return \App\Http\Resources\Step
     */
    public function store(StepStoreRequest $request)
    {
        $step = Step::create($request->all());

        return new StepResource($step);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Step $step
     * @return \App\Http\Resources\Step
     */
    public function show(Request $request, Step $step)
    {
        return new StepResource($step);
    }

    /**
     * @param \App\Http\Requests\StepUpdateRequest $request
     * @param \App\Step $step
     * @return \App\Http\Resources\Step
     */
    public function update(StepUpdateRequest $request, Step $step)
    {
        $step->update([]);

        return new StepResource($step);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Step $step
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Step $step)
    {
        $step->delete();

        return response()->noContent(200);
    }
}
