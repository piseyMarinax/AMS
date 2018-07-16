<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Datatables;
use Redirect;
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
     * @return \Illuminate\Http\Response
     */
    /*
    public function index()
    {
        return view('home');
    } */
    public function index()
    {
        $pre = DB::select('SELECT count(id) as Count1 FROM `tbcustomers` WHERE cust_tid = 1 AND cust_status = 1 AND cust_trash =0');
        $vip = DB::select('SELECT count(id) as Count2 FROM `tbcustomers` WHERE cust_tid = 2 AND cust_status = 1 AND cust_trash =0');
        $gold = DB::select('SELECT count(id) as Count3 FROM `tbcustomers` WHERE cust_tid = 3 AND cust_status = 1 AND cust_trash =0');
        //return view('welcome');
         return view('welcome',compact('pre','vip','gold'));
    }
}
