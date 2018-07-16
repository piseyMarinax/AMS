<?php

namespace App\Http\Controllers;

use App\Model\Tbcustomers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;
use Datatables;
use Redirect;

class CustomersAms extends Controller
{
    public function getIndex(){
		return view('customer.index');
	}
	public function list(){
		return view('customer.index');
	}
}
