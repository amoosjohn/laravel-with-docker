<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppApiKey;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AppApiKeyController extends Controller
{
    public function store(Request $request) {

        $this->validate($request, [
            'user_id' =>'required'
        ]);

        //key expires in 10 days
        $appApiKey = AppApiKey::create([
            'user_id' => $request->user_id,
            'api_key' => Str::random(60),
            'expires_at' => Carbon::now()->addDay(10)
        ]);

        return response()->json(['api_key' => $appApiKey]);
    }
}
