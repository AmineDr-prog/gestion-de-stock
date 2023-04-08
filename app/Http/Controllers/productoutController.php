<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Product;
use App\Models\Product_outs;
use App\Models\Products_out;
use App\Models\Products_outs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class productoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Product = Product::with("Product_out")->get();
        $ProductOut = Product_outs::with("product")->get();
        $ProductOut = Product_outs::with("customer")->get();
        $Customers = Customers::with("Product_out")->get();
        return view("Products.outgoing.index",compact("Product","ProductOut","Customers"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Product_outs::create([
            "product_id" => $request->product,
            "customer_id" => $request->customers,
            "qty" => $request->qty,
            "date" => $request->date
        ]);
        $qt = $request->qty;
        $results = DB::select( DB::raw("UPDATE products SET qty = qty-$qt WHERE id = $request->product;") );
        return redirect(route("productsOut.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Product_outs::where("id",$id)->update([
            "product_id" => $request->product,
            "customer_id" => $request->customers,
            "qty" => $request->qty,
            "date" => $request->date
        ]);
        return redirect(route("productsOut.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product_outs::find($id);
        $products->delete();
        return redirect(route("productsOut.index"));
    }
}
