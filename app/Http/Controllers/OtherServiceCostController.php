<?php

namespace App\Http\Controllers;

use App\OtherServiceCost;
use App\OtherService;
use App\Http\Requests\OtherServiceCostRequest;
use Illuminate\Http\Request;
use DB;

class OtherServiceCostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:other-service-cost-list|other-service-cost-create|other-service-cost-edit|other-service-cost-delete', ['only' => ['index','store']]);
        $this->middleware('permission:other-service-cost-create', ['only' => ['create','store']]);
        $this->middleware('permission:other-service-cost-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:other-service-cost-delete', ['only' => ['destroy']]);
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
    public function store(OtherServiceCostRequest $request)
    {
        DB::beginTransaction();
        $cost=new OtherServiceCost();
        $cost->min_val=$request->min;
        $cost->max_val=$request->max;
        $cost->amount=$request->amount;
        $cost->other_service_id=$request->other_service_id;
        $cost->save();
        DB::commit();
        return back()->withStatus(__('Other Service cost successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OtherServiceCost  $otherServiceCost
     * @return \Illuminate\Http\Response
     */
    public function show(OtherServiceCost $otherServiceCost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OtherServiceCost  $otherServiceCost
     * @return \Illuminate\Http\Response
     */
    public function edit($otherServiceCost)
    {
        $cost=OtherServiceCost::find($otherServiceCost);
        return view('services.admin.edit-servicecosts', compact('cost'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OtherServiceCost  $otherServiceCost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $otherServiceCost)
    {
        DB::beginTransaction();
        $otherServiceCost=OtherServiceCost::find($otherServiceCost);
        $otherServiceCost->min_val=$request->min;
        $otherServiceCost->max_val=$request->max;
        $otherServiceCost->amount=$request->amount;
        $otherServiceCost->other_service_id=$request->other_service_id;
        $otherServiceCost->save();
        DB::commit();
        return redirect()->route('otherservice.show',$otherServiceCost->otherService->id)->withStatus(__('Service cost successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OtherServiceCost  $otherServiceCost
     * @return \Illuminate\Http\Response
     */
    public function destroy($otherServiceCost)
    {
        $otherServiceCost=OtherServiceCost::find($otherServiceCost);
        $otherServiceCost->delete();
        return redirect()->route('otherservice.show',$otherServiceCost->otherService->id)->withStatus(__('Service Cost deleted successfully.'));
    }
}
