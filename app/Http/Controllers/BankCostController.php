<?php

namespace App\Http\Controllers;

use App\BankCost;
use App\OtherService;
use App\Http\Requests\BankCostRequest;
use Illuminate\Http\Request;
use DB;

class BankCostController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:bank-cost-list|bank-cost-create|bank-cost-edit|bank-cost-delete', ['only' => ['index','store']]);
        $this->middleware('permission:bank-cost-create', ['only' => ['create','store']]);
        $this->middleware('permission:bank-cost-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:bank-cost-delete', ['only' => ['destroy']]);
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
    public function store(BankCostRequest $request)
    {
        DB::beginTransaction();
        $cost=new BankCost();
        $cost->min_val=$request->min;
        $cost->max_val=$request->max;
        $cost->amount=$request->amount;
        $cost->bank_id=$request->bank_id;
        $cost->save();
        DB::commit();
        return back()->withStatus(__('Bank cost successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BankCost  $bankCost
     * @return \Illuminate\Http\Response
     */
    public function show(BankCost $bankCost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BankCost  $bankCost
     * @return \Illuminate\Http\Response
     */
    public function edit($bank_cost_id)
    {
        $cost=BankCost::find($bank_cost_id);
        return view('banks.admin.edit-servicecosts', compact('cost'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BankCost  $bankCost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $bank_cost_id)
    {
        DB::beginTransaction();
        $cost=BankCost::find($bank_cost_id);
        $cost->min_val=$request->min;
        $cost->max_val=$request->max;
        $cost->amount=$request->amount;
        $cost->bank_id=$request->bank_id;
        $cost->save();
        DB::commit();
        return redirect()->route('bank.show',$cost->bank->id)->withStatus(__('Bank cost successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BankCost  $bankCost
     * @return \Illuminate\Http\Response
     */
    public function destroy($bank_cost_id)
    {
        $cost=BankCost::find($bank_cost_id);
        $cost->delete();
        return redirect()->route('bank.show',$cost->bank->id)->withStatus(__('Bank Cost deleted successfully.'));
    }
}
