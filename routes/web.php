<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\GiftController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [GiftController::class,'index'])->name('game');

Route::get('/{id}/confirm-gift',function ($id){
    $gift = \App\Models\Gift::findOrFail($id);
    $gift->amount = $gift->amount - 1;
    $gift->save();
    return redirect()->route('game');
})->name('confirm-gift');

Route::get('/admin',function (){
    $gifts = \App\Models\Gift::all();
    return view('admin',compact('gifts'));
})->name('admin');
Route::get('/customer',[CustomerController::class,'index'])->name('customer');
Route::post('/customer/create',[CustomerController::class,'store'])->name('customer.store');
Route::get('/customer/delete/{id}',[CustomerController::class,'destroy'])->name('customer.destroy');
Route::get('/customer/{customerId}/accept-gift/{giftId}',[CustomerController::class,'acceptGift'])->name('customer.acceptGift');

Route::get('/admin/{id}/edit',[GiftController::class,'edit'])->name('edit-gift');
Route::get('/admin/{id}/delete',[GiftController::class,'destroy'])->name('delete-gift');
Route::post('/admin/gift/store',[GiftController::class,'store'])->name('gift.store');
