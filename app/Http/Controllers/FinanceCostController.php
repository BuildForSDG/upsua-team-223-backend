<?php

namespace App\Http\Controllers;

use App\FinanceCost;
use App\Finance;
use App\Http\Requests\FinanceCostRequest;
use Illuminate\Http\Request;
use DB;

class FinanceCostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:finance-cost-list|finance-cost-create|finance-cost-edit|finance-cost-delete', ['only' => ['index','store']]);
        $this->middleware('permission:finance-cost-create', ['only' => ['create','store']]);
        $this->middleware('permission:finance-cost-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:finance-cost-delete', ['only' => ['destroy']]);
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
    public function store(FinanceCostRequest $request)
    {
        DB::beginTransaction();
        $cost=new FinanceCost();
        $cost->min_val=$request->min;
        $cost->max_val=$request->max;
        $cost->amount=$request->amount;
        $cost->finance_id=$request->finance_id;
        $cost->save();
        DB::commit();
        return back()->withStatus(__('Finance cost successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FinanceCost  $financeCost
     * @return \Illuminate\Http\Response
     */
    public function show(FinanceCost $financeCost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FinanceCost  $financeCost
     * @return \Illuminate\Http\Response
     */
    public function edit($finance_cost_id)
    {
        $cost=FinanceCost::find($finance_cost_id);
        return view('finances.admin.edit-financecosts', compact('cost'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FinanceCost  $financeCost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $finance_cost_id)
    {
        DB::beginTransaction();
        $cost=FinanceCost::find($finance_cost_id);
        $cost->min_val=$request->min;
        $cost->max_val=$request->max;
        $cost->amount=$request->amount;
        $cost->finance_id=$request->finance_id;
        $cost->save();
        DB::commit();
        return redirect()->route('finance.show',$cost->finance->id)->withStatus(__('Finance cost successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FinanceCost  $financeCost
     * @return \Illuminate\Http\Response
     */
    public function destroy($finance_cost_id)
    {
        $cost=FinanceCost::find($finance_cost_id);
        $cost->delete();
        return redirect()->route('finance.show',$cost->finance->id)->withStatus(__('Finance Cost deleted successfully.'));
    }
}
