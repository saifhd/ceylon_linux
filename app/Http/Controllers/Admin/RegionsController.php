<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegionsRequest;
use App\Http\Requests\UpdateRegionsRequest;
use App\Models\Region;
use App\Models\Zone;
use Illuminate\Http\Request;

class RegionsController extends Controller
{
    public function index(){
        $regions=Region::with('zone')->paginate(10);
        return view('admin.regions.index',compact('regions'));
    }

    public function create(){
        $region_count = 0;
        $data = Region::orderBy('id', 'desc')->first();
        if(!is_null($data)){
            $region_count=$data->id;
        }

        $code_number = (int)$region_count + 1;
        $code = 'REG' . (int)$code_number;
        $zones=Zone::all();
        return view('admin.regions.create',compact('code','zones'));

    }

    public function store(RegionsRequest $request){
        $zone=Zone::findOrFail($request->zone);
        $zone->regions()->create([
            'code'=>$request->code,
            'name'=>$request->name
        ]);
        return redirect()->route('regions.index')->with('success','Success - New Region Created');

    }

    public function edit(Region $region){
        $zones=Zone::all();
        return view('admin.regions.edit',compact('region','zones'));
    }

    public function update(UpdateRegionsRequest $request, Region $region){
        $region->update([
            'name'=>$request->name,
            'zone_id'=>$request->zone
        ]);
        return redirect()->back()->with('success','Success - Region Updated');
    }

    public function destroy(Region $region){
        $region->delete();
        return redirect()->back()->with('success','Success - Region Deleted');
    }


}
