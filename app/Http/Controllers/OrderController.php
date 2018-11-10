<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
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
      $user = Auth::user();
      // get all the orders
      if ($user->type == 'admin') {
        $orders = Order::all();
      } else {
        $orders = Order::where('UserID', $user->id)->get();
      }

      // load the view and pass the nerds
      return view('order.index', compact('orders'));
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
            if (\Session::has('original_cart_id')) {
              $sessionId = \Session::get('original_cart_id');
              \Session::forget('original_cart_id');
            }
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
        // get the order
        $order = Order::find($id);
        // show the view and pass the order to it
        return view('order.show')->with('order', $order);
    }

    public function changeStatus(Request $req) {
      $id = Input::get('id');
      $order = Order::find($id);
      $updated = [];
      if ($order->Status == 0) {
        $order->Status = 1;
        $updated['status'] = 'Shipped';
        $updated['button'] = 'Wait';
      } else {
        $order->Status = 0;
        $updated['status'] = 'Waiting';
        $updated['button'] = 'Ship';
      }
      $order->save();
      $response = array(
        'status' => 'success',
        'data' => $updated,
        'message' => "status changed."
      );
      return response()->json($response);
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
      // delete
        $order = Order::find($id);
        try {
            $order->delete();
        } catch (\Illuminate\Database\QueryException $ex) {
            $message="";
            if ($ex->getCode() == 23000)
                $message = "The Order being deleted has order details in it. Delete those details before trying again.";
            return Redirect::to('order')
                ->withErrors($message);
        }
        // redirect
        Session::flash('message', 'Successfully deleted the order!');
        return Redirect::to('order');
    }
}
