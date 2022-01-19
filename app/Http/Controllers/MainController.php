<?php

namespace App\Http\Controllers;

use App\Models\Furniture;
use App\Models\TransactionHeader;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function index_home()
    {
        $furnitures = Furniture::inRandomOrder()->limit(4)->get();

        return view('home', compact('furnitures'));
    }

    public function index_viewpage(Request $req)
    {
        $page = $req->page ?? 1;
        $page_count = ceil(Furniture::count()/4);
        $furnitures = Furniture::skip($page*4 - 4)->limit(4)->get();

        return view('viewpage', compact(['furnitures', 'page', 'page_count']));
    }

    public function search_viewpage(Request $req)
    {
        $page = $req->page ?? 1;
        $page_count = ceil(Furniture::where('name', 'like', '%' . $req->searchquery . '%')->count()/4);
        $furnitures = Furniture::where('name', 'like', '%' . $req->searchquery . '%')->skip($page*4 - 4)->limit(4)->get();

        return view('viewpage', compact(['furnitures', 'page', 'page_count']));
    }

    public function index_detail(Request $req)
    {
        $furniture = Furniture::where('id', '=', $req->furniture_id)->get()->first();
        if(!$furniture) return redirect()->route('home');

        return view('detail', compact('furniture'));
    }

    public function index_profile(Request $req)
    {
        return view('profile');
    }

    public function index_profile_update()
    {
        return view('profile_update');
    }

    public function update_profile(Request $req)
    {
        $req->validate([
            'name' => 'required|unique:App\Models\User,name|max:15',
            'email' => 'required|email|unique:App\Models\User,email',
            'pw' => 'required|min:5|max:20',
        ],

        [
            'name.required' => "Full Name must be filled!",
            'name.unique' => "Full Name must be unique!",
            'name.max' => "Full Name maximum character length is 15!",
            'email.required' => "Email must be filled!",
            'email.email' => "Wrong Email format",
            'email.unique' => "Email must be unique!",
            'pw.required' => "Password must be filled!",
            'pw.min' => "Password character length must between 5 and 20!",
            'pw.max' => "Password character length must between 5 and 20!",
        ]);

        if(Auth::user()->role == 0){
            $req->validate([
                'address' => 'required|min:5|max:95',
                'gender' => 'required'
            ],

            [
                'address.required' => "Address must be filled!",
                'address.min' => "Address character length must between 5 and 5!",
                'address.max' => "Address character length must between 5 and 95!",
                'gender' => "Gender must be selected"
            ]);
        }

        $user = User::where('id', '=', Auth::user()->id)->get()->first();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->pw);
        if(Auth::user()->role == 0){
            $user->address = $req->address;
            $user->gender = $req->gender;
        }else{
            $user->address = '-';
            $user->gender = '-';
        }
        $user->save();
        session()->flash('success', 'Update profile successful!');

        return back();
    }

    public function index_transaction()
    {
        if(Auth::user()->role == 0){
            $transactions = TransactionHeader::where('user_id', '=', Auth::user()->id)->get();
        }else{
            $transactions = TransactionHeader::all();
        }

        return view('transactions', compact(['transactions']));
    }
}
