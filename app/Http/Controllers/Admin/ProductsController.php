<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreProductRequest;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index(){
        $products=Product::latest()->paginate(10);
        return view('admin.products.index',compact('products'));
    }

    public function create(){
        $last_id=0;
        $latest_product=Product::latest()->first();
        if(!is_null($latest_product)){
            $last_id=$latest_product->id;
        }
        $next_id=(int)$last_id+1;
        return view('admin.products.create',compact('next_id'));
    }

    public function store(StoreProductRequest $request){
        Product::create([
            'code'=>$request->code,
            'name'=>$request->name,
            'mrp'=>$request->mrp,
            'destribution_price'=>$request->destribution_price,
            'weight'=>$request->weight,
            'volume'=>$request->volume,
        ]);
        return redirect()->route('products.index')->with('success','Success - New Product Created');
    }
}
