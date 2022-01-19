<?php

namespace App\Http\Controllers;

use App\Models\Furniture;
use Illuminate\Http\Request;


class AdminController extends Controller
{

    public function index_update(Request $req)
    {
        $furniture = Furniture::where('id', '=', $req->furniture_id)->get()->first();
        if(!$furniture) return redirect()->route('home');

        return view('admin.update', compact(['furniture']));

    }

    public function updateFurniture(Request $req)
    {
        $furniture = Furniture::where('id', '=', $req->furniture_id)->get()->first();

        $req->validate([
            'name' => 'required|unique:App\Models\Furniture,name|max:15',
            'price' => 'required|numeric|min:5000|max:10000000',
            'type' => 'required',
            'color' => 'required',
        ],

        [
            'name.required' => "Name must be filled!",
            'name.unique' => "Name must be unqiue!",
            'name.max' => "Name maximal lenght is 15",
            'price.required' => "Price must be filled!",
            'price.numeric' => "Price must be numeric!",
            'price.min' => "Price minimal value is 5000!",
            'price.max' => "Price maximal value is 10000000;",
            'type.required' => "Type must be filled!",
            'color.required' => "Color must be filled!",
        ]);

        $furniture->name = $req->name;
        $furniture->price = $req->price;
        $furniture->type = $req->type;
        $furniture->color = $req->color;
        if($req->image){
            $req->validate([
                'image' => 'mimes:jpg,jpeg,png',
            ],

            [
                'image.mimes' => "Image extension must end with .jpg, .jpeg, or .png!",
            ]);

            $filename = $req->image->getClientOriginalName();
            $req->image->storeAs('image/', $filename, 'public');
            $furniture->image = $filename;
        }

        $furniture->save();
        session()->flash('success', 'Product information updated!');

        return back();
    }

    public function deleteFurniture(Request $req)
    {
        $furniture = Furniture::where('id', '=', $req->furniture_id)->get()->first();
        $furniture->delete();

        session()->flash('success', 'Product deleted!');
        if($req->from_detail) return redirect()->route('home');
        else return back();
    }

    public function index_add_furniture()
    {
        return view('admin.add');
    }

    public function add_furniture(Request $req)
    {
        $req->validate([
            'name' => 'required|unique:App\Models\Furniture,name|max:15',
            'price' => 'required|numeric|min:5000|max:10000000',
            'type' => 'required',
            'color' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
        ],
        
        [
            'name.required' => "Name must be filled!",
            'name.unique' => "Name must be unqiue!",
            'name.max' => "Name maximal lenght is 15",
            'price.required' => "Price must be filled!",
            'price.numeric' => "Price must be numeric!",
            'price.min' => "Price minimal value is 5000!",
            'price.max' => "Price maximal value is 10000000;",
            'type.required' => "Type must be filled!",
            'color.required' => "Color must be filled!",
            'image.required' => "Image must be filled!",
            'image.mimes' => "Image extension must end with .jpg, .jpeg, or .png!",
        ]);

        $furniture = new Furniture();
        $furniture->name = $req->name;
        $furniture->price = $req->price;
        $furniture->type = $req->type;
        $furniture->color = $req->color;

        $filename = $req->image->getClientOriginalName();
        $req->image->storeAs('image/', $filename, 'public');
        $furniture->image = $filename;

        $furniture->save();
        session()->flash('success', 'Product successfully added!');

        return back();
    }

}
