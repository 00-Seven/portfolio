<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use Closure;
use Illuminate\Http\Request;

class TrackUser
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
        $visitor = Visitor::where('ip',$_SERVER['REMOTE_ADDR'])->first();
        if($visitor) {
            $visitor->hits +=1;
            $visitor->save();
        }else{
            Visitor::create([
                'ip' => $_SERVER['REMOTE_ADDR'],
                'hits' => 1
            ]);
        }
        return $next($request);
    }
}
