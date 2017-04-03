<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Log;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'logs' => Log::where('user_id', Auth::user()->id)->paginate(50),
        ];

        if (!Auth::user()->has_light_permission)
            $data["alert_message"] = [
                "title" => "Warning!",
                "message" => "You don't have permission to access the " .
                           "lights. An email has been sent to Chandler to " .
                           "verify your account."
            ];

        return view('dashboard', $data);
    }
}
