<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use DateTime;
use Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'first_name'       => 'required|max:50',
            'last_name'       => 'required|max:50',
            'city'      => 'required|max:20',
            'country'      => 'required|max:20',
            'state'      => 'required|max:20',
            'phone_number'      => 'required|max:30',
            'postal_code'      => 'required|max:30',
            'address'      => 'required|max:100',
        );
        $validator = Validator::make(Input::all(), $rules);
        $sessionId = request()->cookie('laravel_session');
        // process the errors
        if ($validator->fails()) {
            return Redirect::to('cart/checkOut')
                ->withErrors($validator)
                ->withInput(Input::all());
        } else {
            // store
            $order = new Order();
            $order->FirstName = Input::get('first_name');
            $order->LastName = Input::get('last_name');
            $order->PostalCode = Input::get('postal_code');
            $order->Address = Input::get('address');
            $order->PhoneNumber = Input::get('phone_number');
            $order->City = Input::get('city');
            $order->State = Input::get('state');
            $order->Country = Input::get('country');
            $order->Status = 0;
            $order->OrderDate = new DateTime();
            $order->UserID = $request->user()->id;
            $order->TotalCost = number_format(\Cart::session($sessionId)->getSubTotal(), 2);
            $order->save();
            // order details
            $sessionId = request()->cookie('laravel_session');
            \Cart::session($sessionId)->getContent()->sortBy('id')->each(function($item) use (&$items, &$order)
            {
              $od = new OrderDetail();
              $od->OrderID = $order->id;
              $od->SouvenirID = $item->id;
              $od->UnitPrice = $item->price;
              $od->Quantity = $item->quantity;
              $od->save();
            });
            if(!\Cart::session($sessionId)->isEmpty()) {
              \Cart::session($sessionId)->clear();
            }
            // redirect
            Session::flash('message', 'Successfully placed the order!');
            return view('order.purchased')->with('order', $order);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
