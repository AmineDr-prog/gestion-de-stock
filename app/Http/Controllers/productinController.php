<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Product_in;
use App\Models\Product_outs;
use App\Models\Suppliers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class productinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Product = Product::with("Product_out")->get();
        $ProductIn = Product_in::with("product")->get();
        $ProductIn = Product_in::with("supplier")->get();
        $supplier = Suppliers::with("Product_out")->get();
        return view("Products.purchased.index",compact("Product","ProductIn","supplier"));
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
        Product_in::create([
            "product_id" => $request->product,
            "supplier_id" => $request->supplier,
            "qty" => $request->qty,
            "date" => $request->date
        ]);
        $qt = $request->qty;
        $results = DB::select( DB::raw("UPDATE products SET qty = qty+$qt WHERE id = $request->product;") );
        return redirect(route("productsIn.index"));
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
        Product_in::where("id",$id)->update([
            "product_id" => $request->product,
            "supplier_id" => $request->supplier,
            "qty" => $request->qty,
            "date" => $request->date
        ]);
        return redirect(route("productsIn.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product_in::find($id);
        $products->delete();
        return redirect(route("productsIn.index"));
    }
}
