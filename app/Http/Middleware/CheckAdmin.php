<?php

namespace App\Http\Middleware;

use App\Models\Answer;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user_id = Auth::id();
        $user = User::findOrFail($user_id);

        if ($user->is_admin ==0) {
            return redirect('index');
        }
        return $next($request);
    }
}
