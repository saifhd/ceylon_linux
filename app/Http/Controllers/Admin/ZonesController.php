<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ZonesRequest;
use App\Models\Zone;
use App\Http\Controllers\Controller;

class ZonesController extends Controller
{
    public function index(){
        $zones=Zone::paginate(10);
        return view('admin.zones.index',compact('zones'));
    }

    public function create(){
        $zones_count=0;
        $data=Zone::orderBy('id','desc')->first();
        if(!is_null($data)){
            $zones_count=$data->id;
        }
        $code_number=(int)$zones_count+1;
        $code='ZONE'.(int)$code_number;
        return view('admin.zones.create',compact('code'));
    }

    public function store(ZonesRequest $request){
        Zone::create([
            'code'=>$request->code,
            'short_description'=>$request->short_description,
            'long_description'=>$request->long_description
        ]);
        return redirect()->route('zones.index')->with('success','Success - New Zone Created');

    }

    public function edit(Zone $zone){
        return view('admin.zones.edit',compact('zone'));
    }

    public function update(ZonesRequest $request,Zone $zone){
        $zone->update([
            'short_description'=> $request->short_description,
            'long_description' => $request->long_description
        ]);
        return redirect()->back()->with('success','Success - Zone Updated');

    }
    public function destroy(Zone $zone){
        $zone->delete();
        return redirect()->back()->with('success','Success - Zone Deleted');
    }
}
