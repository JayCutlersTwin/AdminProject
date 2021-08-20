<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function create() {
       return view('login');
    }

    public function store(Request $request) {

        //Validate requests
        $request->validate([
             'email'=>'required|email',
             'password'=>'required'
        ]);

        $userInfo = User::where('email','=', $request->email)->first();

        if(!$userInfo) {
            return back()->with('fail','We do not recognize your email address');
        } else {
            //check password
            if($request->password == $userInfo->password) {
                $request->session()->put('LoggedUser', $userInfo->name);
                return redirect('/');
            } else {
                return back()->with('fail','Incorrect password');
            }
        }


    }

    public function destroy() {
        if (session()->has('LoggedUser')) {
            session()->pull('LoggedUser');
            return redirect('/login');
        }


    }
}
