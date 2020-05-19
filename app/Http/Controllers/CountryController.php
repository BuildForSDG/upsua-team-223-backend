<?php

namespace App\Http\Controllers;

use App\Country;
use App\Http\Requests\CountryRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use DB;

class CountryController extends Controller
{
    /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */
      public function __construct()
      {
          $this->middleware('permission:country-list');
          $this->middleware('permission:country-create', ['only' => ['create','store']]);
          $this->middleware('permission:country-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:country-delete', ['only' => ['destroy']]);
      }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $model=Country::orderBy('id', 'ASC')->paginate(10);
        return view('countries.index', ['countries' => $model])->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('countries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryRequest $request)
    {
        $country = new Country;
        $country->name=$request->name;
        $country->currency=$request->currency;
        $country->code=$request->code;
        $country->iso_4217_currency_code=$request->iso_4217_currency_code;
        $country->save();
        return redirect()->route('country.index')
                        ->with('success', 'Country created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        return view('countries.show', compact('country'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        return view('countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        $country->name=$request->name;
        $country->currency=$request->currency;
        $country->code=$request->code;
        $country->iso_4217_currency_code=$request->iso_4217_currency_code;
        $country->save();
        return redirect()->route('country.index')
                        ->with('success', 'Country updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country->delete();
        return redirect()->route('country.index')
                        ->with('success', 'Country deleted successfully');
    }
}
