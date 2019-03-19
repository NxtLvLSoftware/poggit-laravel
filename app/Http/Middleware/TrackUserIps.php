<?php

namespace App\Http\Middleware;

use App\Models\KnownIpAddress;
use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Keep track of all known ip addresses a user has visited our site with.
 */
class TrackUserIps
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $ip = $request->getClientIp();
            $user = $request->user();
            $model = $user->known_ips()->where('ip', $ip)->first();
            if ($model === null) {
                //create a new known ip for this user
                KnownIpAddress::create([
                    'user_id' => $user->id,
                    'ip' => $ip,
                ]);
            } else {
                //update the updated_at column so we know the user was last seen with this ip at this time
                $model->touch();
            }
        }

        return $next($request);
    }
}
