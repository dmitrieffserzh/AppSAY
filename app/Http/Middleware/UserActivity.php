<?php

namespace App\Http\Middleware;

use App\Models\Profile;
use Closure;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class UserActivity {
	public function handle($request, Closure $next) {
		if(Auth::check()) {
			$expiresAt = Carbon::now()->addMinutes( 5 );
			Cache::put( 'user-is-online-' . Auth::id(), true, $expiresAt );
			$timestamp = Carbon::now();
			Profile::find(Auth::id())->update([ 'offline_at' => $timestamp]);
		}
		return $next($request);
	}
}