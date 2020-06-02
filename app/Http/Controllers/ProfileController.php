<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\LogoutOtherDiviceRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Locality;
use App\Country;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $countries=Country::all();
        $localities=Locality::all();
        return view('profile.edit',compact('localities','countries'));
    }

    /**
     * logout on other devices except this.
     *
     * @return \Illuminate\Support\Facades\Auth
     */
    public function logoutOtherDevices(LogoutOtherDiviceRequest $request)
    {
        Auth::logoutOtherDevices($request->cpassword);
        return back()->withStatus(__('Disconnection of all devices except this one successfully terminate.'));
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        if(!empty($request->cni_ig)){
            $path = 'profiles';
            $fileName = uploadImage($request->cni_ig, $path);
            auth()->user()->update($request->merge(['cni_img' => $fileName])->all());
            return back()->withStatus(__('Profile successfully updated.'));
        }
        auth()->user()->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }
}
