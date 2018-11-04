<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //
    protected $fillable = [
        'Description', 'Address', 'Email', 'FirstName', 'LastName', 'PhoneNumber'
    ];

    public function souvenirs() : \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Souvenir');
    }
}
