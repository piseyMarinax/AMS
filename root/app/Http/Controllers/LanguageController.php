<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use App;
use Lang;

class LanguageController extends Controller {
    
    /**
     * @desc To change the current language
     * @request Ajax
     */
    
    public function changeLanguage(Request $request){
		if($request->ajax()){
            $request->session()->put('locale',$request->locale);
        }
    }    
	
	public function setSidebar(Request $request){
		if($request->ajax()){
			if(Session::get('sidebar')){
				Session::put('sidebar',NULL);
			}else{
				Session::put('sidebar','fixed');
			}
			return Session::get('sidebar');
		}
	}
}