<?php

namespace App\Http\Controllers;

use GuzzleHttp;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Proxy extends Controller
{
    /**
     * Proxys the request to the light controller 
     *
     * @param  int  $id
     * @return Response
     */
    public function __invoke(Request $request, $path)
    {
        $logged_in = Auth::check() || !Auth::onceBasic();
        if (!$logged_in)
            return Auth::onceBasic();

        $url = "http://192.168.1.10/" . $path . "?" . $request->getQueryString();
        
        $client = new GuzzleHttp\Client();
        try {
            $res = $client->get($url); //, ['auth' =>  ['user', 'pass']]);
        } catch (Exception $e) {
            return $e;
            //abort($res->getStatusCode(), $res->getBody());
        }
        
        if ($res->getStatusCode() == 200) {
            return $res->getBody();
        }
    }
}
