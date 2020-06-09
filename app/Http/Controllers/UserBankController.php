<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bank;
use App\UserBank;

class UserBankController extends Controller
{
    // user bank function
    public function userBank(){
        $banks=Bank::all();
        return view('banks.other.show',compact('banks'));
    }

    // user bank function
    public function methodBank($id){
        $userBanks=auth()->user()->banks;
        $bank=Bank::find($id);
        if(!empty($userBanks)){
            foreach($userBanks as $b){
                if($b->id==$id){
                    return view('banks.other.actions',compact('bank'));
                }
            }
        }
        $ub=new UserBank();
        $ub->user_id=auth()->user()->id;
        $ub->bank_id=$id;
        $ub->save();
        return view('banks.other.actions',compact('bank'));
    }
}
