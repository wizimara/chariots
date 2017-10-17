<?php

namespace App\Modules\Users\Http\Controllers;


use App\Http\Controllers\Controller; 

class UserController extends Controller
{
    public function listUsers()
	{
		return view('users::index');
	}

	public function listRoles()
	{
		return view('users::index');
	}

	public function listPermissions()
	{
		return view('users::index');
	}
}
