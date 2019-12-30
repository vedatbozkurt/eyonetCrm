<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class LanguageController extends Controller
{
	public function index($locale=null)
	{
		$locales= ["tr","en"];
		if(in_array($locale,$locales)){
			Session::put('locale', $locale);
		}
		return redirect()->back();
	}
}
