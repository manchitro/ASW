<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * 
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        return view('global.home', ['users' => $users]);
    }
    public function about()
    {
        return view('global.about');
    }
    public function login()
    {
        return view('global.login');
    }
    public function login_user(LoginRequest $request){
        $user = User::where('email', $request->uid)->first();
        if($user){
            if (Hash::check($request->password, $user->password)) {
                    if (Hash::needsRehash($user->password)) {
                        $user->password = Hash::make($request->password);
                        $user->save();
                    }
                echo 'logged in';
            }
            else{
                $request->session()->flash('error', 'Incorrect password. Please try again!');
                return redirect('/login');
            }
        }
        else{
            $request->session()->flash('error', 'The Email address or Academic ID you have entered does not match any account.');
            return redirect('/login');
        }
    }

    public function register()
    {
        return view('global.register');
    }
    public function create_account(RegisterRequest $request){
        $user = new User();

        $user->academicid = $request->academicid;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password); 
        $user->usertype = 'faculty';
        
        $user->save();
        $request->session()->flash('message','Your account was created successfully. Please login with your email and password.');
        return redirect('/login');
    }
}
