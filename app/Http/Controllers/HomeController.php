<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

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
        if(Auth()->user()->userable_type==="App\\AdminAccount"){
            return view('dashboard-admin');
        }
        return view('dashboard-user');
    }

    public function test()
    {
        //dd(Auth()->user()->userable->business->user);
        //dd(Auth()->user()->type());
        return view('test');
    }
}
