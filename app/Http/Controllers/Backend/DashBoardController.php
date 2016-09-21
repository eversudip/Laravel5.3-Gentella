<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashBoardController extends Controller
{

	/**
	 * Return the dashboard view page
	 * @return \Illuminate\Http\Response
	 */
    public function index()
    {
    	return view('backend.dashboard.home');
    }
}
