<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Locality;
use App\PartnerAccount;
use App\PaymentCost;
use App\Http\Requests\PaymentRequest;
use Illuminate\Http\Request;
use DB;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:payment-list|payment-create|payment-edit|payment-delete', ['only' => ['index','store']]);
        $this->middleware('permission:payment-create', ['only' => ['create','store']]);
        $this->middleware('permission:payment-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:payment-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Payment $model){
        $model=Payment::all();
        return view('payments.admin.index', ['payments' => $model]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $localities = Locality::all();
        $partners = PartnerAccount::all();
        return view('payments.admin.create', compact('localities','partners'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentRequest $request)
    {
        DB::beginTransaction();
        $payment=new Payment();
        $payment->name=$request->name;
        $payment->description=$request->description;

        $path = 'payments';
		$nomFichier = uploadImage($request->payment_img, $path);
        $payment->payment_img=$nomFichier;

        $payment->method_accepted=$request->method_accepted;
        $payment->number=$request->number;
        $payment->partner_account_id=$request->partner_account_id;
        $payment->locality_id=$request->locality_id;
        $payment->save();
        DB::commit();
        return redirect()->route('payment.index')->withStatus(__('Payment successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        $localities = Locality::all();
        $partners = PartnerAccount::all();
        $costs= $payment->costs;
        return view('payments.admin.show', compact('localities','partners','payment','costs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        $localities = Locality::all();
        $partners = PartnerAccount::all();
        return view('payments.admin.edit', compact('localities','partners','payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        DB::beginTransaction();
        $payment->name=$request->name;
        $payment->description=$request->description;

        if(!empty($request->payment_img)){
            $path = 'payments';
		    $nomFichier = uploadImage($request->payment_img, $path);
            $payment->payment_img=$nomFichier;
        }

        $payment->method_accepted=$request->method_accepted;
        $payment->number=$request->number;
        $payment->partner_account_id=$request->partner_account_id;
        $payment->locality_id=$request->locality_id;
        $payment->save();
        DB::commit();
        return redirect()->route('payment.index')->withStatus(__('Payment successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('payment.index')->withStatus(__('Payment deleted successfully.'));
    }
}
