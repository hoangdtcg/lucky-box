<?php

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

Route::get('/admin/{id}/edit',[GiftController::class,'edit'])->name('edit-gift');
Route::get('/admin/{id}/delete',[GiftController::class,'destroy'])->name('delete-gift');
Route::post('/admin/gift/store',[GiftController::class,'store'])->name('gift.store');
