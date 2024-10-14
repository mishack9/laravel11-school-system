<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function student_login()
    {
        return view('student.login');
    }


    public function authenticate(Request $request)
    {

        $request->validate([
            's_email' => ['required', 'email'],
            'password' => ['required']
                           ]);

                           if($student = Student::where('email', $request->email)->first()){
                           if(!$student->guard('student') && Hash::check($request->password, $student->password))
                           {
                            Auth::guard('student')->logout();
                            return redirect()->route('student.login')->with(['error' => 'Unauthorized User Access... Access Denied !!!.. ']);
                           }

                           return redirect()->route('student.dashboard')->with(['success' => 'Successfully Logged_In.. ']);

                        } else {
                            return redirect()->route('student.login')->with(['error' => 'Invalid Credentails !!!.. ']);
                        }
                        
                        }


                        public function logout()
                        {
                            Auth::guard('student')->logout();

                            return redirect()->route('student.login');
                        }
}
