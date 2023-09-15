<?php

namespace App\Http\Middleware;

use App\Models\PersonalInfo;
use App\Models\SocialMedia;
use Closure;
use Illuminate\Http\Request;

class ShareDataMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $personal_info = PersonalInfo::find(4);
        $socialmedia = SocialMedia::where('status', 1)->get();

        view()->share('personal_info', $personal_info);
        view()->share('socialmedia', $socialmedia);

        return $next($request);
    }
}
