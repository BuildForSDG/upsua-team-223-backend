<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Payment;
use App\OtherService;
use App\Bank;
use App\Finance;

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
        if (Auth()->user()->userable_type==="App\\AdminAccount") {
            return view('dashboard-admin');
        }
        // event(new UserRegistered(User::find(1)));
        $otherServices=OtherService::all();
        $payments=Payment::all();
        $banks=Bank::all();
		$finances=Finance::all();
        return view('dashboard-user',compact('payments','otherServices','banks','finances'));
    }

    public function test()
    {
        //dd(Auth()->user()->userable->business->user);
        //dd(Auth()->user()->type());
        return view('test');
    }

    public function notifications()
    {
        return view('notifications');
    }
}
