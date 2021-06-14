<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;

class Enable
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
        $isenabled = $user['enable'];

        if($isenabled == 0)
        {
            session()->flash('fail', 'This User is Disabled');
            return redirect(route('login'));
        }
        
        return $next($request);
    }
}
