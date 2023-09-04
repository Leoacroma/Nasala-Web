<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        try {
            $Endpoint = 'http://188.166.211.230:9091/v1/api/users';
            $client = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => 'Bearer' .$request->cookie('token')

            ]);

            $response = $client->get($Endpoint);
            if ($response->status() === 200) {
                $body = $response->object();
                //do some stuff with response here, like setting the global logged in user
                return $next($request);
                // return redirect()->route('admin.dash');
            }
        }
        catch (RequestException $exception) {

        }
        return redirect()->route('admin.login');
    }
}

?>