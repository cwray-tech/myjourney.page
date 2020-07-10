<?php

namespace App\Http\Controllers;

use App\Http\Requests\JourneyStoreRequest;
use App\Http\Requests\JourneyUpdateRequest;
use App\Http\Resources\Journey as JourneyResource;
use App\Http\Resources\JourneyCollection;
use App\Journey;
use Illuminate\Http\Request;

class JourneyController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\JourneyCollection
     */
    public function index(Request $request)
    {
        $journeys = Journey::all();

        return new JourneyCollection($journeys);
    }

    /**
     * @param \App\Http\Requests\JourneyStoreRequest $request
     * @return \App\Http\Resources\Journey
     */
    public function store(JourneyStoreRequest $request)
    {
        $journey = Journey::create($request->all());

        return new JourneyResource($journey);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Journey $journey
     * @return \App\Http\Resources\Journey
     */
    public function show(Request $request, Journey $journey)
    {
        return new JourneyResource($journey);
    }

    /**
     * @param \App\Http\Requests\JourneyUpdateRequest $request
     * @param \App\Journey $journey
     * @return \App\Http\Resources\Journey
     */
    public function update(JourneyUpdateRequest $request, Journey $journey)
    {
        $journey->update([]);

        return new JourneyResource($journey);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Journey $journey
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Journey $journey)
    {
        $journey->delete();

        return response()->noContent(200);
    }
}
