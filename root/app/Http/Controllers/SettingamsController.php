<?php

namespace App\Http\Controllers;

use App\Model\Tbcusttypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;
use Datatables;
use Redirect;

class SettingamsController extends Controller
{
    public function getIndex()
	{
		return view('ams.setcustype');
	}
}
