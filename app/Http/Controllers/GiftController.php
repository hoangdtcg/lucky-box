<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use Illuminate\Http\Request;

class GiftController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'gift_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

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
