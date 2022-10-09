<?php

namespace Database\Seeders;

use App\Models\Gift;
use Illuminate\Database\Seeder;

class GiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gift = new Gift();
        $gift->name = "Sản phẩm Demo 1";
        $gift->price = 30000;
        $gift->amount = 99;
        $gift->save();

        $gift = new Gift();
        $gift->name = "Sản phẩm Demo 2";
        $gift->price = 30000;
        $gift->amount = 99;
        $gift->save();

        $gift = new Gift();
        $gift->name = "Sản phẩm Demo 3";
        $gift->price = 30000;
        $gift->amount = 99;
        $gift->save();

        $gift = new Gift();
        $gift->name = "Sản phẩm Demo 4";
        $gift->price = 30000;
        $gift->amount = 99;
        $gift->save();
    }
}
