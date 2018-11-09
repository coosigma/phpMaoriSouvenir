<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //
    protected $fillable = [
        'OrderID', 'SouvenirID', 'Quantity', 'UnitPrice'
    ];

    public function order() : \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Order', 'OrderID', 'id');
    }

    public function souvenir() : \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Souvenir', 'SouvenirID', 'id');
    }

}
