<?php

namespace App\Http\Controllers;

use App\Models\Furniture;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{


    public function addToCart(Request $req)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$req->furniture_id])) $cart[$req->furniture_id] += 1;
        else $cart[$req->furniture_id] = 1;

        session()->put('cart', $cart);

        session()->flash('success', 'Product added to cart!');
        return back();
    }

    public function index_cart()
    {
        $session_cart = session()->get('cart') ?? [];
        $cart = [];
        $total_payment = 0;
        foreach ($session_cart as $key => $value) {
            $furniture = Furniture::withTrashed()->where('id', '=', $key)->get()->first();
            $temp = [];
            $temp['furniture'] = $furniture;
            $temp['qty'] = $value;
            $total_payment += $furniture->price * $value;
            $cart[] = $temp;
        }

        return view('member.cart', compact(['cart', 'total_payment']));
    }

    public function change_cart(Request $req)
    {
        $session_cart = session()->get('cart');
        if($req->action == "1"){
            $session_cart[$req->furniture_id] ++;
        }else if($req->action == "-1"){
            $session_cart[$req->furniture_id] --;
        }

        if($session_cart[$req->furniture_id] <= 0) unset($session_cart[$req->furniture_id]);

        session()->put('cart', $session_cart);

        return redirect()->route('member_cart');
    }

    public function index_checkout()
    {
        $session_cart = session()->get('cart');
        if(!$session_cart) {
            session()->flash('failed', 'Your cart is empty!');
            return back();
        }
        $cart = [];
        $total_payment = 0;
        foreach ($session_cart as $key => $value) {
            $furniture = Furniture::withTrashed()->where('id', '=', $key)->get()->first();
            $temp = [];
            $temp['furniture'] = $furniture;
            $temp['qty'] = $value;
            $total_payment += $furniture->price * $value;
            $cart[] = $temp;
        }

        return view('member.checkout', compact(['cart', 'total_payment']));
    }

    public function checkout(Request $req)
    {
        $session_cart = session()->get('cart');
        if(!$session_cart) {
            session()->flash('failed', 'Your cart is empty!');
            return back();
        }

        $req->validate([
            'payment' => 'required',
            'card_number' => 'required|numeric|digits:16'
        ],
        
        [
            'payment.required' => 'Payment Method must be filled!',
            'card_number.required' => 'Card Number must be filled!',
            'card_number.numeric' => 'Card Number must be numeric!',
            'card_number.digits' => 'Card Number length must be 16',
        ]);


        $cart = [];
        $total_payment = 0;
        foreach ($session_cart as $key => $value) {
            $furniture = Furniture::withTrashed()->where('id', '=', $key)->get()->first();
            $temp = [];
            $temp['furniture'] = $furniture;
            $temp['qty'] = $value;
            $temp['subtotal'] = $furniture->price * $value;;
            $total_payment += $temp['subtotal'];
            $cart[] = $temp;
        }

        $header = new TransactionHeader();
        $header->method = $req->payment;
        $header->card_number = $req->card_number;
        $header->user_id = Auth::user()->id;
        $header->total_payment = $total_payment;
        $header->save();

        foreach ($cart as $key => $value) {
            $detail = new TransactionDetail();
            $detail->header_id = $header->id;
            $detail->furniture_id = $value['furniture']->id;
            $detail->quantity = $value['qty'];
            $detail->subtotal = $value['subtotal'];
            $detail->save();
        }

        session()->remove('cart');
        session()->flash('success', 'Checkout successful!');
        return redirect('/');
    }
}
