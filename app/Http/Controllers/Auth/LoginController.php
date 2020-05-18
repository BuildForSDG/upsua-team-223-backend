<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\BasicAccount;
use App\Account;
use DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleGithubCallback()
    {
        $user = Socialite::driver('github')->user();

        //save the user to the database.
        $dbUser = User::where('github_user_id', $user->user['id'])->first();

        if( is_null($dbUser) )
        {
            DB::beginTransaction();
            //normal configuration of account
            $basic=new BasicAccount;
            $basic->save();

            //register the user
            $dbUser = new User;

            $dbUser->name = $user->name;
            $dbUser->email = $user->email;
            $dbUser->github_user_id = $user->user['id'];
            $dbUser->api_token = $user->token;
            $dbUser->email_verified_at = now();
            $dbUser->userable_type = 'App\\BasicAccount';
            $dbUser->userable_id = $basic->id;

            $dbUser->save();

            //normal configuration of account
            $account=new Account;
            $account->user_id=$user->id;
            $account->balance=0;
            $account->save();
            DB::commit();
        }

        //authenticate the user
        Auth::loginUsingId($dbUser->id);

        return redirect()->route('dashboard');
    }
}
