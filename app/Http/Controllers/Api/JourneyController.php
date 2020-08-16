<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\JourneyUpdateRequest;
use App\Journey;
use Illuminate\Http\Request;

class JourneyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function update(JourneyUpdateRequest $request, Journey $journey){
        $this->authorize('update', $journey);
        $journey->update([
            'title' => $request->title,
            'introduction' => $request->introduction
        ]);
        if($request->picture) {
            $journey->update([
                'picture' => $request->file('picture')->store('journey-images', 'public'),
            ]);
        }

        return response('Success', 204);
    }
}
