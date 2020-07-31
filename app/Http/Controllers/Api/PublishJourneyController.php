<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Journey;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PublishJourneyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Journey $journey)
    {
        $this->authorize('update', $journey);
        if (!$journey->published_at){
            $journey->update([
                'published_at' => Carbon::now()->timestamp
            ]);
        }
            $journey->update([
                'is_published' => '1'
            ]);

        return response('Success', '204');
    }

    public function destroy(Journey $journey)
    {
        $this->authorize('update', $journey);
        $journey->update([
            'is_published' => '0'
        ]);
        return response('Success', '204');
    }
}
