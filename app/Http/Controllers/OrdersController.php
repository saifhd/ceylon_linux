<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Zone;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(){
        $orders=Order::latest()->with(['destributor','territory','region'])->paginate(10);
        return view('user.orders.index',compact('orders'));
    }



    public function create(){
        $po_no=1;
        $latest_order=Order::latest()->first();
        if(!is_null($latest_order)){
            $po_no=(int)$latest_order->id+1;
        }
        $zones=Zone::all();
        $products=Product::all();

        return view('user.orders.create',compact('zones','products','po_no'));
    }

    public function store(Request $request){
        $request->validate([
            'zone'=>'required',
            'region' => 'required',
            'territory' => 'required',
            'destributor' => 'required',

        ]);

        $table_array=$this->getTableData($request);
        $total=$this->gettotal($table_array);

        $order=Order::create([
            'zone_id'=>$request->zone,
            'region_id'=>$request->region,
            'territory_id'=>$request->territory,
            'remark'=>$request->remark,
            'destributor_id'=>$request->destributor,
            'total'=>$total
        ]);
        foreach($table_array as $item){
            $product=Product::where('code',$item['code'])->first();
            $order->products()->attach([$product->id],['units'=>$item['units']]);
        }
        return redirect()->back()->with('success','Success - New Order Created');

    }

    private function getTableData($request){
        $allItems = explode(',', $request->table_array);
        $array = [];
        $sub_array = [];
        $i = 0;

        foreach ($allItems as $item) {
            if ($i == 6) {
                $sub_array['total'] = $item;
                $i = 0;
                $array[] = $sub_array;
            } else {
                switch ($i) {
                    case 0:
                        $sub_array['code'] = $item;
                        break;
                    case 1:
                        $sub_array['name'] = $item;
                        break;
                    case 2:
                        $sub_array['price'] = $item;
                        break;
                    case 3:
                        $sub_array['avb_qty'] = $item;
                        break;
                    case 4:
                        $sub_array['qty'] = $item;
                        break;
                    case 5:
                        $sub_array['units'] = $item;
                        break;
                }
                $i++;
            }
        }
        foreach ($array as $key => $arr) {
            if ($arr['units'] == "") {
                unset($array[$key]);
            }
        }
        return $array;
    }

    private function gettotal($table_array){
        $total=0;
        foreach($table_array as $array){
            $total=$total+(int)$array['total'];
        }
        return $total;

    }
}
