<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\UserSession;

class UpdateUserSession
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $sessionId = Session::getId();

            // Check if the session already exists in the database
            $existingSession = UserSession::where('user_id', $user->id)
                ->where('session_id', $sessionId)
                ->first();

            if ($existingSession) {
                // Update the last_activity_at timestamp
                $existingSession->update(['last_activity_at' => now()]);
            } else {
                // Create a new session record
                UserSession::create([
                    'user_id' => $user->id,
                    'session_id' => $sessionId,
                    'last_activity_at' => now(),
                    'device_info' => $request->header('User-Agent'), // You can customize this
                ]);
            }
        }

        return $next($request);
    }
}