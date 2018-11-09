<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'City', 'Country', 'FirstName', 'LastName', 'OrderDate', 'PhoneNumber', 'State', 'Address',
        'PostalCode', 'Status', 'TotalCost', 'UserID'
    ];

    public function user() : \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\User', 'UserID', 'id');
    }

    public function orderDetails() : \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\OrderDetail', 'OrderID', 'id');
    }
}
