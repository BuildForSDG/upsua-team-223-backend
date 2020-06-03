<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OtherService;

class UserServiceController extends Controller
{
    // user service function
    public function userService(){
        $otherServices=OtherService::all();
        return view('services.other.show',compact('otherServices'));
    }

    // user service function
    public function methodService($id){
        $otherService=OtherService::find($id);
        return view('services.other.actions',compact('otherService'));
    }
}
