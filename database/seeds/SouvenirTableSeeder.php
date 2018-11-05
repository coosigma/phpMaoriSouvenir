<?php

use Illuminate\Database\Seeder;

class SouvenirTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $sou =  new \App\Souvenir(['Name'=>"Survival Kit", 'Description'=>"Survival Kit",
        'PhotoPath'=>"/img/SouvenirImages/travellers_survival_kit.jpg",
        'Price'=>"24.95", 'CategoryID'=>"1", 'SupplierID'=>"1"]);
        $sou->save();
        $sou =  new \App\Souvenir(['Name'=>"Dolls Kit", 'Description'=>"Dolls Kit",
            'PhotoPath'=>"/img/SouvenirImages/Dolls.jpeg",
            'Price'=>"35.45", 'CategoryID'=>"1", 'SupplierID'=>"1"]);
        $sou->save();
        $sou =  new \App\Souvenir(['Name'=>"Jade0", 'Description'=>"J0",
            'PhotoPath'=>"/img/SouvenirImages/Jade.jpg",
            'Price'=>"500.00", 'CategoryID'=>"2", 'SupplierID'=>"2"]);
        $sou->save();
        $sou =  new \App\Souvenir(['Name'=>"Jade1", 'Description'=>"J1",
            'PhotoPath'=>"/img/SouvenirImages/Jade1.jpg",
            'Price'=>"100.00", 'CategoryID'=>"2", 'SupplierID'=>"2"]);
        $sou->save();
        $sou =  new \App\Souvenir(['Name'=>"Jade2", 'Description'=>"J2",
            'PhotoPath'=>"/img/SouvenirImages/Jade2.jpg",
            'Price'=>"200.00", 'CategoryID'=>"2", 'SupplierID'=>"2"]);
        $sou->save();
        $sou =  new \App\Souvenir(['Name'=>"Jade3", 'Description'=>"J3",
            'PhotoPath'=>"/img/SouvenirImages/Jade3.jpg",
            'Price'=>"300.00", 'CategoryID'=>"2", 'SupplierID'=>"2"]);
        $sou->save();
        $sou =  new \App\Souvenir(['Name'=>"Jade4", 'Description'=>"J4",
            'PhotoPath'=>"/img/SouvenirImages/Jade4.jpg",
            'Price'=>"400.00", 'CategoryID'=>"2", 'SupplierID'=>"2"]);
        $sou->save();
        $sou =  new \App\Souvenir(['Name'=>"Boat Craft", 'Description'=>"Boat Craft",
            'PhotoPath'=>"/img/SouvenirImages/Boat.jpg",
            'Price'=>"100.00", 'CategoryID'=>"3", 'SupplierID'=>"3"]);
        $sou->save();
        $sou =  new \App\Souvenir(['Name'=>"Postcard", 'Description'=>"Postcard",
            'PhotoPath'=>"/img/SouvenirImages/Postcard.jpg",
            'Price'=>"1.00", 'CategoryID'=>"4", 'SupplierID'=>"4"]);
        $sou->save();
        $sou =  new \App\Souvenir(['Name'=>"Kai", 'Description'=>"Sea food",
            'PhotoPath'=>"/img/SouvenirImages/Boat.jpg",
            'Price'=>"30.00", 'CategoryID'=>"5", 'SupplierID'=>"5"]);
        $sou->save();
    }
}
