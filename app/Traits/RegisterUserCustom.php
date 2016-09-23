<?php

namespace App\Traits;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use App\Events\RegistrationMailSend;

trait RegisterUserCustom
{
	use RegistersUsers;

	
	 /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        //event(new Registered($user = $this->create($request->all())));
        $user = $this->registerUser($request);

        
        event(new RegistrationMailSend(\App\Models\User::find($user)));
        
        return redirect('/user/login');
    }

    /**
     * Store the new user
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Models\User  $user
     */
    protected function registerUser($request)
    {
        $newUser = new User();
        $newUser->name = $request->input('name');
        $newUser->email = $request->input('email');
        $newUser->password = bcrypt($request->input('password'));
        $newUser->confirmation_code = Str::random(60);
        $newUser->status = 0;
        $newUser->save();
        return $newUser->id;
    }

    /**
     * Confirm the confirmation link
     * @param  \Illuminate\Http\Request  $confirmationCode
     * @return \Illuminate\Http\Response
     */
    protected function confirmEmail($confirmationCode)
    {
        $user = User::where('confirmation_code', $confirmationCode)->get();

        if(count($user)==0)
        { 
            return redirect('/user/register')->with('error', 'Verification Code do not Match!' );
        }

        $user->status = 1;
        $user->save();
        return redirect('/user/login')->with('success', 'Successfully Verified the Confirmation link!, Please login to continue' );
    }

}