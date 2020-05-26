<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\simpleUserRequest;
use App\Http\Requests\UserPassRequest;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\accountTransactionsRequest;
use App\BasicAccount;
use App\BusinessAccount;
use App\PartnerAccount;
use App\Account;
use App\Transaction;
use App\Http\Middleware\Partner;
use DB;

class OtherUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:user-list|user-other-create|user-other-edit|user-delete', ['only' => ['index','store']]);
        $this->middleware('permission:user-other-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-other-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
        $this->middleware('permission:account-management', ['only' => ['accountManagement','accountToType']]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('users.other.create');
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(simpleUserRequest $request, User $model)
    {
        DB::beginTransaction();
        $basic=new BasicAccount;
        $basic->save();
        $user =$model->create($request->merge(['password' => Hash::make($request->get('password')),'userable_type' => 'App\\BasicAccount','userable_id'=>$basic->id,'api_token' => Str::random(60)])->all());
        $account=new Account;
        $account->user_id=$user->id;
        $account->balance=0;
        $account->save();
        DB::commit();
        return redirect()->route('user.index')->withStatus(__('User successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.other.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('users.other.edit', compact('user'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User  $user)
    {
        $user->name=$request->name;
        $user->phone=$request->phone;
        $user->email=$request->email;
        $user->save();

        return redirect()->route('user.index')->withStatus(__('User successfully updated.'));
    }
    // updated to

    public function updateToBusiness(Request $request, User  $user)
    {
        DB::beginTransaction();
        $basic=BasicAccount::find($user->userable_id);
        $business=new BusinessAccount;
        $business->basic_account_id=$basic->id;
        $business->save();

        $user->userable_type = 'App\\BusinessAccount';
        $user->userable_id=$business->id;
        $user->save();
        DB::commit();
        return redirect()->route('user.index')->withStatus(__('Account successfully updated.'));
    }

    public function updateToPartner(Request $request, User  $user)
    {
        DB::beginTransaction();
        $business=BusinessAccount::find($user->userable_id);
        $partner=new PartnerAccount;
        $partner->business_account_id=$business->id;
        $partner->save();

        $user->userable_type = 'App\\PartnerAccount';
        $user->userable_id=$business->id;
        $user->save();
        DB::commit();
        return redirect()->route('user.index')->withStatus(__('Account successfully updated.'));
    }
    public function accountManagement($user_id)
    {
        $user = User::find($user_id);
        return view('users.other.account', compact('user'));
    }
    public function accountToType(accountTransactionsRequest $request, User  $user)
    {
        DB::beginTransaction();
        $account=$user->account;
        if($request->type=='credited'){

            $transaction=new Transaction;
            $transaction->account_id=$account->id;
            $transaction->transaction_code=randomString(10);
            $transaction->type='Pay in';
            $transaction->amount=$request->amount;
            $transaction->post_balance=$account->balance;
            $transaction->iso_4217_currency_code=$account->user->country->iso_4217_currency_code;
            $transaction->description='Credited an account by upsua';
            $transaction->save();

            $account->balance+=$request->amount;
        }
        if($request->type=='debited'){

            $transaction=new Transaction;
            $transaction->account_id=$account->id;
            $transaction->transaction_code=randomString(10);
            $transaction->type='Pay out';
            $transaction->amount=$request->amount;
            $transaction->post_balance=$account->balance;
            $transaction->iso_4217_currency_code=$account->user->country->iso_4217_currency_code;
            $transaction->description='Debited an account by upsua';
            $transaction->save();

            $account->balance-=$request->amount;
        }
        $account->save();
        DB::commit();
        return redirect()->route('user.index')->withStatus(__('transaction completed successfully'));
    }
}
