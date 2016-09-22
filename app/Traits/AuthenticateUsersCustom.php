<?php

namespace App\Traits;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;


trait AuthenticateUsersCustom
{
	use AuthenticatesUsers;

	
	/**
     * The user has been authenticated and provide the route where to redirect after successful login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        redirect()->intended($this->redirectPath());
    }
}