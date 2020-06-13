<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Finance;
use App\UserFinance;

class UserFinanceController extends Controller
{
    // user finance function
    public function userFinance(){
        $finances=Finance::all();
        return view('finances.other.show',compact('finances'));
    }

    // user finance function
    public function methodFinance($id){
        $userFinances=auth()->user()->finances;
        $finance=Finance::find($id);
        if(!empty($userFinances)){
            foreach($userFinances as $f){
                if($f->id==$id){
                    return view('finances.other.actions',compact('finance'));
                }
            }
        }
        $uf=new UserFinance();
        $uf->user_id=auth()->user()->id;
        $uf->finance_id=$id;
        $uf->save();
        return view('finances.other.actions',compact('finance'));
    }
}
