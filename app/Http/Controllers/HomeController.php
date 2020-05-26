<?php

namespace App\Http\Controllers;

use App\User;
use App\Events\UserRegistered;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    public function index()
    {
        return view('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        // event(new UserRegistered(User::find(1)));
        return view('dashboard');
    }

    public function notifications()
    {
        return view('notifications');
    }
}
