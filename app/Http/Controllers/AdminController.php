<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
           $request->validate([
                    'email' => ['required', 'email'],
                    'password' => ['required']
           ]);

           if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]))
           {
            if(Auth::guard('admin')->user()->role != 'admin')
            {
                Auth::guard('admin')->logout();
            return redirect()->route('admin.login')->with('error', 'Oops !! Unauthorised user ! Access Denied ! ... '); 
            }
             return redirect()->route('admin.dashboard'); 
           } else {
             return redirect()->route('admin.login')->with('error', 'Oops !! Invalid Credentails ... '); 
           }
    }

    public function registerForm()
    {
        return view('admin.register');
    }

    public function register(Request $request)
    {

        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'], 
            'password' => ['required', 'max:8', 'min:3', 'confirmed']
        ]);
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = "student";
        $user->password = $request->password;

        $user->save();

        return redirect()->route('admin.login')->with('success', 'Registration Successfully ... ');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function form()
    {
        return view('admin.form');
    }

    public function table()
    {
        return view('admin.table');
    }
    
}
