<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;

class Disable
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next)
    {
        $user = User::where('email', $request->email)->first();
        $isDisabled = $user['disable'];

        if($isDisabled == 1)
        {
            session()->flash('fail', 'This User is Disabled');
            return redirect(route('login'));
        }
        
        return $next($request);
    }
}
