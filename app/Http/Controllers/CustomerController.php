<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Gift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customer',compact('customers'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'phone' => 'required|unique:customers,phone'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('errorForm', $validator->errors()->getMessages())
                ->withInput();
        }

        $customer = new Customer();
        $customer->name = $request->username;
        $customer->phone = $request->phone;
        $customer->gift_id = $request->giftId;
        $customer->save();
        return redirect()->back();
    }

    public function acceptGift($customerId, $giftId)
    {
        $customer = Customer::findOrFail($customerId);
        $gift = Gift::findOrFail($giftId);
        $gift->amount = $gift->amount - 1;
        $customer->is_receive = 1;
        $customer->save();
        $gift->save();
        return redirect()->back()->with('success', 'Nhận quà thành công');
    }

    public function destroy($id){
        Customer::where("id",$id)->delete();
        return redirect()->back()->with('success', 'Xoá khách hàng thành công');
    }
}
