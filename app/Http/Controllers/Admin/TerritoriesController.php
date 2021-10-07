<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTerritoryRequest;
use App\Http\Requests\UpdateTerritoryRequest;
use App\Models\Region;
use App\Models\Territory;
use App\Models\Zone;

class TerritoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $territories=Territory::with('region.zone')->paginate(10);
        return view('admin.territories.index',compact('territories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $territory_count = 0;
        $data = Territory::orderBy('id', 'desc')->first();
        if (!is_null($data)) {
            $territory_count = $data->id;
        }

        $code_number = (int)$territory_count + 1;
        $code = 'TER' . (int)$code_number;
        $zones=Zone::all();
        return view('admin.territories.create',compact('zones','code'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTerritoryRequest $request)
    {
        $region=Region::findOrFail($request->region);
        $region->territories()->create([
            'name'=>$request->name,
            'code'=>$request->code
        ]);
        return redirect()->route('territories.index')->with('success','Success - Territory Created');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Territory $territory)
    {
        $zones=Zone::all();
        return view('admin.territories.edit',compact('zones','territory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTerritoryRequest $request, Territory $territory)
    {
        $territory->update([
            'region_id'=>$request->region,
            'name'=>$request->name,

        ]);
        return redirect()->back()->with('success','Success - Territory Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Territory $territory)
    {
        $territory->delete();
        return redirect()->back()->with('success','Success - Territory Deleted');
    }
}
