<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Souvenir extends Model
{
    //
    protected $fillable = [
        'Name', 'Description', 'PhotoPath', 'Price', 'CategoryID', 'SupplierID'
    ];

    public function category() : \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Category', 'CategoryID', 'id');
    }

    public function supplier() : \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Supplier', 'SupplierID', 'id');
    }

    public function orderDetails() : \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\OrderDetail', 'SouvenirID');
    }
}
