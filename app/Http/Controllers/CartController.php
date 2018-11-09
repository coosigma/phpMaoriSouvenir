<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Souvenir;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Session;
use Redirect, Log;

class CartController extends Controller
{
    //
    public function addItem(Request $request){
        $id = Input::get('id');
        $userId = request()->cookie('laravel_session');
        $souvenir = Souvenir::find($id);
        $id = $souvenir->id;
        $name = $souvenir->Name;
        $price = $souvenir->Price;
        $category = $souvenir->category->Name;
        $qty = 1;
        $customAttributes = [
            'category' => $category,
        ];
        $item = \Cart::session($userId)->add($id, $name, $price, $qty, $customAttributes);
        $response = array(
          'status' => 'success',
          'data' => $request->session()->all(),
          'message' => "item added."
        );
        return response()->json($response);
    }

    private function getItems() {
        $userId = request()->cookie('laravel_session');
        $items = [];
        \Cart::session($userId)->getContent()->sortBy('id')->each(function($item) use (&$items)
        {
            $items[] = $item;
        });
        return $items;
    }

    public function getCart(Request $request) {

        $userId = request()->cookie('laravel_session');

        $items = $this->getItems();
        $total = \Cart::session($userId)->getSubTotal();
        $gst = $total * 0.15;
        $sub = $total * 0.85;
        return response(array(
            'success' => true,
            'data' => $items,
            'total' => number_format($total,2),
            'gst' => number_format($gst,2),
            'sub' => number_format($sub,2),
            'message' => 'cart get items success'
        ),200,[]);
    }

    public function reduceItem(Request $request, $id) {
        $userId = request()->cookie('laravel_session');
        $item = \Cart::session($userId)->get($id);
        if ($item != null) {
          if ($item->quantity <= 1) {
            \Cart::session($userId)->remove($id);
          } else {
            \Cart::session($userId)->update($id, array(
              'quantity' => -1,
            ));
          }
        }
        $items = $this->getItems();
        $total = \Cart::session($userId)->getSubTotal();
        $gst = $total * 0.15;
        $sub = $total * 0.85;
        return $this->getCart($request);
    }

    public function emptyCart(Request $request) {
        $userId = request()->cookie('laravel_session');
        if(!\Cart::session($userId)->isEmpty()) {
          \Cart::session($userId)->clear();
        }
        return $this->getCart($request);
    }

    public function checkOut(Request $request) {
      $user = $request->user();
      if ($user != null) {
        return view('order.placeOrder');
      }
      else {
        \Session::put('redirect_url', \Request::getRequestUri());
        return redirect(url('login'));
      }
    }

}
