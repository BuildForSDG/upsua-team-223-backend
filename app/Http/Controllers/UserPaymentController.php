<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;

class UserPaymentController extends Controller
{

    // user payment function
    public function userPayments(){
        $payments=Payment::all();
        return view('payments.other.show',compact('payments'));
    }


    // methode payment
    public function methodPayment($id){
        $payment=Payment::find($id);
        return view('payments.other.actions',compact('payment'));
    }
}
