<?php

namespace App\Http\Controllers;

use App\Log;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'logs' => Log::latest()->paginate(50),
        ];

        return view('admin.logs', $data);

    }
}
