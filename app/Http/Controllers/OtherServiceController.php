<?php

namespace App\Http\Controllers;

use App\OtherService;
use App\Locality;
use App\PartnerAccount;
use App\Http\Requests\OtherServiceRequest;
use Illuminate\Http\Request;
use DB;

class OtherServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:other-service-list|other-service-create|other-service-edit|other-service-delete', ['only' => ['index','store']]);
        $this->middleware('permission:other-service-create', ['only' => ['create','store']]);
        $this->middleware('permission:other-service-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:other-service-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OtherService $model){
        $model=OtherService::all();
        return view('services.admin.index', ['otherServices' => $model]);
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
        return view('services.admin.create', compact('localities','partners'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OtherServiceRequest $request)
    {
        DB::beginTransaction();
        $service=new OtherService();
        $service->name=$request->name;
        $service->description=$request->description;

        $path = 'services';
		$nomFichier = uploadImage($request->img, $path);
        $service->img=$nomFichier;

        $service->number=$request->number;
        $service->partner_account_id=$request->partner_account_id;
        $service->locality_id=$request->locality_id;
        $service->save();
        DB::commit();
        return redirect()->route('otherservice.index')->withStatus(__('Service successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OtherService  $otherService
     * @return \Illuminate\Http\Response
     */
    public function show($otherService)
    {
        $otherService=OtherService::find($otherService);
        $localities = Locality::all();
        $partners = PartnerAccount::all();
        $costs= $otherService->costs;
        return view('services.admin.show', compact('localities','partners','otherService','costs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OtherService  $otherService
     * @return \Illuminate\Http\Response
     */
    public function edit($otherService)
    {
        $otherService=OtherService::find($otherService);
        $localities = Locality::all();
        $partners = PartnerAccount::all();
        return view('services.admin.edit', compact('localities','partners','otherService'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OtherService  $otherService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $otherService)
    {
        DB::beginTransaction();
        $otherService=OtherService::find($otherService);
        $otherService->name=$request->name;
        $otherService->description=$request->description;

        if(!empty($request->img)){
            $path = 'services';
		    $nomFichier = uploadImage($request->img, $path);
            $otherService->img=$nomFichier;
        }

        $otherService->number=$request->number;
        $otherService->partner_account_id=$request->partner_account_id;
        $otherService->locality_id=$request->locality_id;
        $otherService->save();
        DB::commit();
        return redirect()->route('otherservice.index')->withStatus(__('Service successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OtherService  $otherService
     * @return \Illuminate\Http\Response
     */
    public function destroy($otherService)
    {
        $otherService=OtherService::find($otherService);
        $otherService->delete();
        return redirect()->route('otherservice.index')->withStatus(__('Service deleted successfully.'));
    }
}
