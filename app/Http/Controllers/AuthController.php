<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * create the register screen
     */
    public function registerView()
    {
        return view('auth.register');
    }
    /**
     * create the login screen
     */
    public function loginView()
    {
        return view('auth.login');
    }
    /**
     * creates and register new user
     */
    public function register(Request $request)
    {
        // validates user input
        $this->validate($request,[
           'name'     => 'required|min:3|max:191',
           'email'    => 'email|required|unique:users',
           'password' =>  'required|min:6|max:191'
        ]);

        //create a new instance of user
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();
        return redirect('/login/view')->with('success_message','thank you for joining us');
    }
    /**
     *  a user logs in valid credentials and will be redirected
     *  to create post page otherwiser an error message will be return
     */
    public function login(Request $request)
    {
        //use credentials
        $credentials = [
          'email'    => $request->input('email'),
          'password' => $request->input('password')
        ];

        // check if login details are valid
         if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect('/post/create');
        }else{
            return redirect('/login/view')->with('error_message','your email or password are incorrect');
         }
      
    }
    /**
     * logs the user out
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

       return redirect('/login/view')->with('success_message','you have logged out successfully');
    }

}
