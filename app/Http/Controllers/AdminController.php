<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Foodchef;
use App\Models\Order;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // ******** user section starts here *********
    public function user()
    {
        $data = User::all();
        return view('Admin.users', compact('data'));
    }
    public function deleteuser($id) //delete user
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->back();
    }
    //***************** uesr section ends here ***********

    public function Foodmenu()   //this action is for show food menu from database
    {
        $data = food::all();
        return view('Admin.Foodmenu', compact('data'));
    }
    //updata food
    public function uploadfood(Request $request)
    {
        $data = new food();
        $image = $request->image; //image code
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('foodImage', $imagename);
        $data->image = $imagename;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->save();
        return redirect()->back();
    }
    public function deletemenu($id) //delete foodmenu
    {
        $data = food::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function editmenu($id) //edit food menu view
    {
        $data = food::find($id);
        return view('Admin.editView', compact('data'));
    }
    public function edit(Request $request, $id) //this is for edit the existing data
    {
        $data = food::find($id);
        $image = $request->image; //image code
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('foodImage', $imagename);
        $data->image = $imagename;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->save();
        return redirect()->back();
    }
    // ******** reservation section starts here *********
    public function reservation(Request $request)
    {
        $data = new reservation();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->guest = $request->guest;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->message = $request->message;
        $data->save();
        return redirect()->back();
    }
    public function viewreservation()   //this action is for show reserved people from database
    {
        if (Auth::id()) {
            $data = reservation::all();
            return view('Admin.reservation', compact('data'));
        } else {
            return redirect('login');
        }
    }
    public function reservationDelete($id) //delete reservation existing records
    {
        $data = reservation::find($id);
        $data->delete();
        return redirect()->back();
    }
    // *********** reservation section ends here **************


    // *********** Admin chef starts here **************
    public function viewchef()
    {
        $chefData = foodchef::all(); //to show all data from database with image
        return view('Admin.adminchef', compact('chefData'));
    }
    public function uploadchef(Request $request)
    {
        $data = new foodchef();
        $image = $request->image; //image code
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('chefimage', $imagename);
        $data->image = $imagename;
        $data->name = $request->name;
        $data->speciality = $request->speciality;
        $data->save();
        return redirect()->back();
    }
    public function editChef($id) //edit food menu view
    {
        $data = foodchef::find($id);
        return view('Admin.editAdminChef', compact('data'));
    }
    public function updatechef(Request $request, $id) //edit information
    {
        $data = foodchef::find($id);
        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('chefimage', $imagename);
        $data->image = $imagename;
        $data->name = $request->name;
        $data->speciality = $request->speciality;
        $data->save();
        return redirect()->back();
    }
    public function deleteChef($id)
    {
        $data = foodchef::find($id);
        $data->delete();
        return redirect()->back();
    }
    // *********** Order starts here **************
    public function orders()
    {
        $orderData = order::all(); //to show all data from database
        return view('Admin.orders', compact('orderData'));
    }
    public function search(Request $request)
    {
        $search = $request->search;
        $orderData = order::where('name', 'like', '%' . $search . '%')->get(); //for search
        return view('Admin.orders', compact('orderData'));
    }
}
