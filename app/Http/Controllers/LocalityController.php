<?php

namespace App\Http\Controllers;

use App\Locality;
use App\Country;
use Illuminate\Http\Request;
use App\Http\Requests\LocalityRequest;
use Spatie\Permission\Models\Permission;
use DB;

class LocalityController extends Controller
{
    /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */
      public function __construct()
      {
          $this->middleware('permission:locality-list');
          $this->middleware('permission:locality-create', ['only' => ['create','store']]);
          $this->middleware('permission:locality-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:locality-delete', ['only' => ['destroy']]);
      }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $model=Locality::orderBy('id', 'ASC')->paginate(10);
        return view('localities.index', ['localities' => $model])->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model=Country::all();
        return view('localities.create', ['countries' => $model]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocalityRequest $request)
    {
        $locality = new Locality;
        $locality->name=$request->name;
        $locality->subdivision=$request->subdivision;
        $locality->country_id=$request->country;
        $locality->save();
        return redirect()->route('locality.index')
                        ->with('success', 'locality created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Locality  $locality
     * @return \Illuminate\Http\Response
     */
    public function show(Locality $locality)
    {
        return view('localities.show', compact('locality'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Locality  $locality
     * @return \Illuminate\Http\Response
     */
    public function edit(Locality $locality)
    {
        $countries=Country::all();
        return view('localities.edit', compact('locality','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Locality  $locality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Locality $locality)
    {
        $locality->name=$request->name;
        $locality->subdivision=$request->subdivision;
        $locality->country_id=$request->country;
        $locality->save();
        return redirect()->route('locality.index')
                        ->with('success', 'locality updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Locality  $locality
     * @return \Illuminate\Http\Response
     */
    public function destroy(Locality $locality)
    {
        $locality->delete();
        return redirect()->route('locality.index')
                        ->with('success', 'locality deleted successfully');
    }
}
