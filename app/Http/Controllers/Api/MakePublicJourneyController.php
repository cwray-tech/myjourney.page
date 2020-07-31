<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Journey;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MakePublicJourneyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Journey $journey)
    {
        $this->authorize('update', $journey);
        $journey->update([
            'is_public' => '1'
        ]);

        return response('Success', '204');
    }

    public function destroy(Journey $journey)
    {
        $this->authorize('update', $journey);
        $journey->update([
            'is_public' => '0'
        ]);
        return response('Success', '204');
    }
}
