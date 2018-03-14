<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    public function index(){

   	return view('main.index')
   			->with('customers_count', Customer::all()->count())
   			->with('products_count', Product::all()->count());
   }
}
