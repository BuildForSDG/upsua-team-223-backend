<?php

namespace App\Http\Controllers;

use App\Finance;
use App\Locality;
use App\PartnerAccount;
use App\Http\Requests\FinanceRequest;
use Illuminate\Http\Request;
use DB;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:finance-list|finance-create|finance-edit|finance-delete', ['only' => ['index','store']]);
        $this->middleware('permission:finance-create', ['only' => ['create','store']]);
        $this->middleware('permission:finance-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:finance-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Finance $model){
        $model=Finance::all();
        return view('finances.admin.index', ['finances' => $model]);
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
        return view('finances.admin.create', compact('localities','partners'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FinanceRequest $request)
    {
        DB::beginTransaction();
        $finance=new Finance();
        $finance->name=$request->name;
        $finance->description=$request->description;

        $path = 'finances';
		$nomFichier = uploadImage($request->img, $path);
        $finance->img=$nomFichier;

        $finance->number=$request->number;
        $finance->partner_account_id=$request->partner_account_id;
        $finance->locality_id=$request->locality_id;
        $finance->save();
        DB::commit();
        return redirect()->route('finance.index')->withStatus(__('finance successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function show($finance_id)
    {
        $finance=Finance::find($finance_id);
        $localities = Locality::all();
        $partners = PartnerAccount::all();
        $costs= $finance->costs;
        return view('finances.admin.show', compact('localities','partners','finance','costs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function edit($finance_id)
    {
        $finance=Finance::find($finance_id);
        $localities = Locality::all();
        $partners = PartnerAccount::all();
        return view('finances.admin.edit', compact('localities','partners','finance'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $finance_id)
    {
        DB::beginTransaction();
        $finance=Finance::find($finance_id);
        $finance->name=$request->name;
        $finance->description=$request->description;

        if(!empty($request->img)){
            $path = 'services';
		    $nomFichier = uploadImage($request->img, $path);
            $finance->img=$nomFichier;
        }

        $finance->number=$request->number;
        $finance->partner_account_id=$request->partner_account_id;
        $finance->locality_id=$request->locality_id;
        $finance->save();
        DB::commit();
        return redirect()->route('finance.index')->withStatus(__('Finance successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function destroy($finance_id)
    {
        $finance=Finance::find($finance_id);
        $finance->delete();
        return redirect()->route('finance.index')->withStatus(__('Finance deleted successfully.'));
    }
}
