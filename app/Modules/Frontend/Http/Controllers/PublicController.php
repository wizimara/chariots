<?php

namespace App\Modules\Frontend\Http\Controllers;


use App\Http\Controllers\Controller; 

class PublicController extends Controller
{
    public function showHomepage()
	{
		return view('frontend::index');
	}
}
