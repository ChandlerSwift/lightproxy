<?php

namespace App\Http\Controllers;

use App\Log;
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

        if (!Auth::user()->has_light_permission)
            return response()->view('unauthorized', [], 403);

        switch (preg_split("#/#", $path)[0]) {
            case "switch":
                $after_host = substr($path, strpos($path, '/') + 1);
                $url = "http://192.168.1.11/" . $after_host;
                break;
            case "light":
                $url = "http://192.168.1.10/" . $path;
                if ($request->getQueryString() != "")
                    $url += "?" . $request->getQueryString();
                break;
            default:
                return("error in switch statement");
	}

	$full_query_string_for_logs = $path . "?" . $request->getQueryString();

        $client = new GuzzleHttp\Client();
        try {
            $res = $client->get($url); //, ['auth' =>  ['user', 'pass']]);
        } catch (Exception $e) {
            return $e;
            //abort($res->getStatusCode(), $res->getBody());
        }

        $log = new Log;
        $log->url = $full_query_string_for_logs;
        $log->user_id = Auth::user()->id;
        $log->save();

        if ($res->getStatusCode() == 200) {
            return $res->getBody();
        }
    }
}
