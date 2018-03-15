<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Transaction;

class TransactionController extends Controller
{
    public function index(){
    	return view('main.transactions.index');
    }
}
