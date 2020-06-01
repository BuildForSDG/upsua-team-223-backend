<?php

namespace App\Http\Controllers;

use App\Payment;
use App\User;
use App\Transaction;
use App\Http\Requests\PaymentOutRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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

    public function paymentOutMethod(PaymentOutRequest $request, $payment)
    {
        DB::beginTransaction();
        $sender=auth()->user();
        $receiver=null;
        $payment=Payment::find($payment);
        if(!empty(User::where('phone','=',$request->methods)->first())){
            $receiver=User::where('phone','=',$request->methods)->first();
        }

        if(!empty(User::where('email','=',$request->methods)->first())){
            $receiver=User::where('email','=',$request->methods)->first();
        }
        if(empty($receiver)){
            return back()->withStatus(__('transaction not completed successfully null user'));
        }

        $senderAccount=$sender->account;
        $receiverAccount=$receiver->account;

        if($payment->number=='1'){
                //debited sender Account

            $transactionSend=new Transaction;
            $transactionSend->account_id=$senderAccount->id;
            $transactionSend->transaction_code=randomString(10);
            $transactionSend->type='Pay out';
            $transactionSend->amount=$request->amount;
            $transactionSend->post_balance=$senderAccount->balance;
            if(isset($senderAccount->user->country->iso_4217_currency_code)){
                $transactionSend->iso_4217_currency_code=$senderAccount->user->country->iso_4217_currency_code;
            }
            $transactionSend->description='Debited to '.$receiver->email;

            if($senderAccount->balance-$request->amount<0){
                return back()->withStatus(__('transaction not completed successfully null value'));
            }
            $transactionSend->save();

            $senderAccount->balance-=$request->amount;
            $senderAccount->save();

            //credited reciver account

            $transactionRecive=new Transaction;
            $transactionRecive->account_id=$receiverAccount->id;
            $transactionRecive->transaction_code=randomString(10);
            $transactionRecive->type='Pay in';
            $transactionRecive->amount=$request->amount;
            $transactionRecive->post_balance=$receiverAccount->balance;
            if(isset($receiverAccount->user->country->iso_4217_currency_code)){
                $transactionRecive->iso_4217_currency_code=$receiverAccount->user->country->iso_4217_currency_code;
            }
            $transactionRecive->description='Credited an account by '.$sender->email;
            $transactionRecive->save();

            $receiverAccount->balance+=$request->amount;

            $receiverAccount->save();
        }else{
            return "No yet";
        }
        DB::commit();
        return redirect()->route('user.index')->withStatus(__('transaction completed successfully'));
    }
}
