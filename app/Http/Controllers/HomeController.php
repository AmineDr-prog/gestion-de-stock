<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Customers;
use App\Models\Product;
use App\Models\Product_in;
use App\Models\Product_outs;
use App\Models\Suppliers;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $Categories = Categories::all();
        $Customers = Customers::all();
        $Product = Product::all();
        $Product_in = Product_in::all();
        $Product_outs = Product_outs::all();
        $Suppliers = Suppliers::all();
        $User = User::all();
        return view('home',compact("Categories","Customers","Product","Product_in","Product_outs","Suppliers","User"));
    }
}
