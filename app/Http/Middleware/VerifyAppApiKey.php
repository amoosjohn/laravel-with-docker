<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\AppApiKey;

class VerifyAppApiKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $appApiKeyIsValid = ($request->header('app_api_key') && AppApiKey::where('api_key', $request->header('app_api_key'))->exists());

        if(!$appApiKeyIsValid) {
            return response()->json(['message' => 'Access denied'], 403);
        }


        return $next($request);
    }
}
