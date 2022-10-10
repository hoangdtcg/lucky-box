<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use Illuminate\Http\Request;

class GiftController extends Controller
{
    public function index()
    {
        $gifts = \App\Models\Gift::where('amount','>',0)->where('rate','>',0)->inRandomOrder()->get();
        $totalRate = Gift::sum('rate');
        $sum = 0;
        $rand = rand(0, $totalRate);
        $gift = $gifts[0];
        foreach ($gifts as $giftItem){
            $sum += $giftItem->rate;
            if($rand <= $sum){
                $gift = $giftItem;
                break;
            }
        }
        return view('game',compact('gift'));
    }
    public function store(Request $request)
    {
//        $request->validate([
////            'gift_img' => 'image|mimes:jpeg,png,jpg,gif,svg',
//        ]);

        if ($request->file('gift_img')) {
            $imagePath = $request->file('gift_img');
            $imageName = $imagePath->getClientOriginalName();
            $path = $request->file('gift_img')->storeAs('uploads', $imageName,'public');
        } else {
            $gift = Gift::find($request->gift_id);
            $path = $gift ? $gift->image : '';
        }

        Gift::updateOrCreate([
            'id' => $request->gift_id
        ],
            [
                'name' => $request->gift_name,
                'price' => $request->gift_price,
                'amount' => $request->gift_amount,
                'rate' => $request->gift_rate,
                'image' => $path
            ]);

        return response()->json(['success' => 'Gift saved successfully.']);
    }

    public function edit($id)
    {
        $product = Gift::find($id);
        return response()->json($product);
    }


    public function destroy($id)
    {
        Gift::find($id)->delete();

        return response()->json(['success' => 'Gift deleted successfully.']);
    }
}
