<?php

namespace App\Http\Controllers;

use App\Models\Furniture;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;



class AuthController extends Controller
{
    public function index_login()
    {
        return view('guest.login');
    }

    public function login(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'pw' => 'required'
        ],

        [
            'email.required' => "Email must be filled!",
            'pw.required' => "Password must be filled!",
        ]);

        $credential = [
            'email' => $req->email,
            'password' => $req->pw
        ];

        if(Auth::attempt($credential)){
            if($req->remember){
                $data = [];
                $data['email'] = $req->email;
                $data['password'] = $req->pw;
                Cookie::queue('logged', json_encode($data), 60);
            }

            return redirect()->route('home');
        }else{
            session()->flash('failed', 'Wrong email/password combination.');
            return redirect()->route('login');
        }
    }

    public function index_register()
    {
        return view('guest.register');
    }

    public function register(Request $req)
    {
        $req->validate([
            'name' => 'required|unique:App\Models\User,name|regex:/^[a-zA-Z\s]*$/',
            'email' => 'required|email|unique:App\Models\User,email',
            'pw' => 'required|min:5|max:20',
            'address' => 'required|min:5|max:95',
            'gender' => 'required'
        ],
        
        [
            'name.required' => "Full Name must be filled!",
            'name.unique' => "Full Name must be unique!",
            'name.regex' => "Full Name must only consists of letter and space",
            'email.required' => "Email must be filled!",
            'email.email' => "Wrong Email format",
            'email.unique' => "Email must be unique!",
            'pw.required' => "Password must be filled!",
            'pw.min' => "Password character length must between 5 and 20!",
            'pw.max' => "Password character length must between 5 and 20!",
            'address.required' => "Address must be filled!",
            'address.min' => "Address character length must between 5 and 95!",
            'address.max' => "Address character length must between 5 and 20!",
            'gender' => "Gender must be selected"
        ]);


        $user = new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->pw);
        $user->address = $req->address;
        $user->gender = $req->gender;
        $user->remember_token = Str::random();
        $user->role = 1;
        $user->save();

        session()->flash('success', 'Your account has been created.');

        return redirect()->route('login');
    }

    public function logout()
    {
        Auth::logout();
        session()->flash('success', 'Logout Successful');
        return redirect('/');
    }
}
