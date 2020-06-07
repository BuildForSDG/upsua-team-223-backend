<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Locality;
use App\PartnerAccount;
use App\Http\Requests\BankRequest;
use Illuminate\Http\Request;
use DB;

class BankController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:bank-list|bank-create|bank-edit|bank-delete', ['only' => ['index','store']]);
        $this->middleware('permission:bank-create', ['only' => ['create','store']]);
        $this->middleware('permission:bank-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:bank-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Bank $model){
        $model=Bank::all();
        return view('banks.admin.index', ['banks' => $model]);
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
        return view('banks.admin.create', compact('localities','partners'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BankRequest $request)
    {
        DB::beginTransaction();
        $bank=new Bank();
        $bank->name=$request->name;
        $bank->description=$request->description;

        $path = 'banks';
		$nomFichier = uploadImage($request->img, $path);
        $bank->img=$nomFichier;

        $bank->number=$request->number;
        $bank->partner_account_id=$request->partner_account_id;
        $bank->locality_id=$request->locality_id;
        $bank->save();
        DB::commit();
        return redirect()->route('bank.index')->withStatus(__('Bank successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function show($bank_id)
    {
        $bank=Bank::find($bank_id);
        $localities = Locality::all();
        $partners = PartnerAccount::all();
        $costs= $bank->costs;
        return view('banks.admin.show', compact('localities','partners','bank','costs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit($bank_id)
    {
        $bank=Bank::find($bank_id);
        $localities = Locality::all();
        $partners = PartnerAccount::all();
        return view('banks.admin.edit', compact('localities','partners','bank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $bank_id)
    {
        DB::beginTransaction();
        $bank=Bank::find($bank_id);
        $bank->name=$request->name;
        $bank->description=$request->description;

        if(!empty($request->img)){
            $path = 'services';
		    $nomFichier = uploadImage($request->img, $path);
            $bank->img=$nomFichier;
        }

        $bank->number=$request->number;
        $bank->partner_account_id=$request->partner_account_id;
        $bank->locality_id=$request->locality_id;
        $bank->save();
        DB::commit();
        return redirect()->route('banks.index')->withStatus(__('Bank successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy($bank_id)
    {
        $bank=Bank::find($bank_id);
        $bank->delete();
        return redirect()->route('bank.index')->withStatus(__('Bank deleted successfully.'));
    }
}
