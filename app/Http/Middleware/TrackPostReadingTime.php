<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Post;

class TrackPostReadingTime
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if(!$request->session()->has('postStartTime')){
            $request->session()->put('postStartTime',now());
        }
        return $next($request);
    }

    public function terminate($request, $response)
    {
        //var_dump($request->route()->parameter('id'));
       // exit();
        if(!$request->session()->has('postStartTime')){
            $startTime = $request->session()->get('postStartTime');
            $endTime = now();
            $timeSpent = $endTime->diffInSeconds($startTime);
            $post_id =  $request->route()->parameter('id');
            Post::where("id",protectData($post_id))->update(["last_read_time" => $timeSpent]);
            //$request->user->readingTime()->create([
               // ''
           // ])
            $request->session()->forget('postStartTime');
        }
       
    }
}
