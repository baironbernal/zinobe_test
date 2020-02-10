<?php

namespace App\Http\Controllers;

use App\Models\Log;

class HomeController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $logs = Log::orderBy('created_at','desc')->simplePaginate(6);
        return view('home', compact('logs'));
    }
}
