<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Food;
use App\Models\Foodchef;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            return redirect('redirects');
        } else {
            $data = food::all();
            $data2 = foodchef::all();
        }
        return view('Home', compact('data', 'data2'));
    }
    public function redirects()
    {
        $data = food::all();
        $data2 = foodchef::all();
        $userType = Auth::user()->userType;
        if ($userType == '1') {
            return view('Admin.adminHome');
        } else {
            //this is for count number get from cart
            $userid = Auth::id();
            $count = cart::where('user_id', $userid)->count();
            return view('Home', compact('data', 'data2', 'count'));
        }
    }
    public function addcart(Request $request, $id)
    {
        if (Auth::id()) {
            $userid = Auth::id();
            $foodid = $id;
            $quantity = $request->quantity;
            $cart = new Cart;
            $cart->user_id = $userid;
            $cart->food_id = $foodid;
            $cart->quantity = $quantity;
            $cart->save();
            return redirect()->back();
        } else {
            return redirect('login');
        }
    }
    public function showcart(Request $request, $id)
    {
        if (Auth::id() == $id) {
            $count = cart::where('user_id', $id)->count();
            $data2 = cart::select('*')->where('user_id', '=', $id)->get();
            $data = cart::where('user_id', $id)->join('food', 'carts.food_id', '=', 'food.id')->get();
            return view('showcart', compact('count', 'data', 'data2'));
        } else {
            return redirect()->back();
        }
    }
    public function remove($id)
    {
        $data = cart::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function orderconfirm(Request $request)
    {
        foreach ($request->foodname as $key => $foodname) {
            $data = new Order();
            $data->foodname = $foodname;
            $data->price = $request->price[$key];
            $data->quantity = $request->quantity[$key];
            $data->name = $request->name;
            $data->phone = $request->phone;
            $data->address = $request->address;
            $data->save();
        }
        return redirect()->back();
    }
}
