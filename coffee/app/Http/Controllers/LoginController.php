<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function Index()
    {
    	$data ['page_titel'] = 'Dashboard';
    	return view('index', $data);
    }

    public function logout()
    {
    	\Auth::logout();

    	return redirect('login');
    }
}
