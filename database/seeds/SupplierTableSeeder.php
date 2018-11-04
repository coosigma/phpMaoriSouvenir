<?php

use Illuminate\Database\Seeder;

class SupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $sup = new \App\Supplier(['Description' => 'Maori Gifts Sup', 'Address'=>'131 ABC',
            'Email'=>'ak@email.com', 'FirstName'=>'Amada', 'LastName'=>'Kia',
            'PhoneNumber'=>'0211234567']);
        $sup->save();
        $sup = new \App\Supplier(['Description' => 'Jewels Sup', 'Address'=>'132 ABC',
            'Email'=>'jr@email.com', 'FirstName'=>'John', 'LastName'=>'Rich',
            'PhoneNumber'=>'0211234566']);
        $sup->save();
        $sup = new \App\Supplier(['Description' => 'Crafts Sup', 'Address'=>'133 ABC',
            'Email'=>'mw@email.com', 'FirstName'=>'Mary', 'LastName'=>'Well',
            'PhoneNumber'=>'0211234565']);
        $sup->save();
        $sup = new \App\Supplier(['Description' => 'Arts Sup', 'Address'=>'134 ABC',
            'Email'=>'ts@email.com', 'FirstName'=>'Tom', 'LastName'=>'Smart',
            'PhoneNumber'=>'0211234564']);
        $sup->save();
        $sup = new \App\Supplier(['Description' => 'Foods Sup', 'Address'=>'135 ABC',
            'Email'=>'jb@email.com', 'FirstName'=>'Jack', 'LastName'=>'Big',
            'PhoneNumber'=>'0211234563']);
        $sup->save();
    }
}
