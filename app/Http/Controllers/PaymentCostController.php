<?php

namespace App\Http\Controllers;

use App\PaymentCost;
use App\Payment;
use App\Http\Requests\PaymentCostRequest;
use Illuminate\Http\Request;
use DB;

class PaymentCostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:payment-cost-list|payment-cost-create|payment-cost-edit|payment-cost-delete', ['only' => ['index','store']]);
        $this->middleware('permission:payment-cost-create', ['only' => ['create','store']]);
        $this->middleware('permission:payment-cost-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:payment-cost-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentCostRequest $request)
    {
        DB::beginTransaction();
        $cost=new PaymentCost;
        $cost->type=$request->type;
        $cost->min_val=$request->min;
        $cost->max_val=$request->max;
        $cost->amount=$request->amount;
        $cost->payment_id=$request->payment_id;
        $cost->save();
        DB::commit();
        return back()->withStatus(__('Payment cost successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PaymentCost  $paymentCost
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentCost $paymentCost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PaymentCost  $paymentCost
     * @return \Illuminate\Http\Response
     */
    public function edit($paymentCost)
    {
        $cost=PaymentCost::find($paymentCost);
        return view('payments.admin.edit-paymentcosts', compact('cost'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PaymentCost  $paymentCost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $paymentCost)
    {
        DB::beginTransaction();
        $paymentCost=PaymentCost::find($paymentCost);
        $paymentCost->type=$request->type;
        $paymentCost->min_val=$request->min;
        $paymentCost->max_val=$request->max;
        $paymentCost->amount=$request->amount;
        $paymentCost->payment_id=$request->payment_id;
        $paymentCost->save();
        DB::commit();
        return redirect()->route('payment.show',$paymentCost->payment->id)->withStatus(__('Payment cost successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PaymentCost  $paymentCost
     * @return \Illuminate\Http\Response
     */
    public function destroy($paymentCost)
    {
        $paymentCost=PaymentCost::find($paymentCost);
        $paymentCost->delete();
        return redirect()->route('payment.show',$paymentCost->payment->id)->withStatus(__('payment Cost deleted successfully.'));
    }
}
