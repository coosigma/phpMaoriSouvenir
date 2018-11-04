<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $cate = new \App\Category(['Name'=> 'MaoriGift', 'Description' => 'Maori Gifts']);
        $cate->save();
        $cate = new \App\Category(['Name'=> 'Jewel', 'Description' => 'Jewels']);
        $cate->save();
        $cate = new \App\Category(['Name'=> 'Craft', 'Description' => 'Crafts']);
        $cate->save();
        $cate = new \App\Category(['Name'=> 'Art', 'Description' => 'Arts']);
        $cate->save();
        $cate = new \App\Category(['Name'=> 'Food', 'Description' => 'Foods']);
        $cate->save();
    }
}
