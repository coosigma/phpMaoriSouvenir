<?php
/**
 * Created by PhpStorm.
 * User: Coos
 * Date: 2018/11/10
 * Time: 16:19
 */
?>


@extends('Shared._layout')
@section('title', 'Orders')
@section('content')

    <div class="container-fluid">

        <h1>Showing Order: {{ $order->id }}</h1>

<hr />
    <dl class="dl-horizontal">

      <?php if (Auth::check() && Auth::user()->type == 'admin'): ?>
        <dt> User ID</dt>
        <dd> {{$order->UserID}}</dd>
      <?php endif; ?>
        <dt>FirstName</dt>
        <dd>{{$order->FirstName}}</dd>

        <dt>LastName</dt>
        <dd>{{$order->LastName}}</dd>

        <dt>PhoneNumber</dt>
        <dd>{{$order->PhoneNumber}}</dd>

        <dt>Email</dt>
        <dd>{{$order->user->email}}</dd>

        <dt>Address</dt>
        <dd>{{$order->Address}}</dd>

        <dt>City</dt>
        <dd>{{$order->City}}</dd>

        <dt>State</dt>
        <dd>{{$order->State}}</dd>

        <dt>PostalCode</dt>
        <dd>{{$order->PostalCode}}</dd>

        <dt>Country</dt>
        <dd>{{$order->Country}}</dd>

        <dt>TotalCost</dt>
        <dd>{{$order->TotalCost}}</dd>

        <dt>OrderDate</dt>
        <dd>{{$order->OrderDate}}</dd>

         <dd>
            <table class="table">
                <tr>
                    <th>Item ID</th>
                    <th>Souvenir</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
                 @foreach($order->orderDetails as $od)
                <tr>
                  <td>
                    {{$od->SouvenirID}}
                  </td>
                  <td>
                    {{$od->souvenir->Name}}
                  </td>
                  <td>
                    {{$od->souvenir->category->Name}}
                  </td>
                  <td>
                    {{$od->Quantity}}
                  </td>
                  <td>
                    {{$od->UnitPrice}}
                  </td>
                </tr>
                @endforeach

                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <label>Sub Total:</label>
                    </td>
                    <td>
                      {{number_format($order->TotalCost*0.85, 2)}}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <label>Total GST:</label>
                    </td>
                    <td>
                      {{number_format($order->TotalCost*0.15, 2)}}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <label>Total:</label>
                    </td>
                    <td>
                        {{number_format($order->TotalCost, 2)}}
                    </td>
                </tr>
            </table>
        </dd>
    </dl>
  </div>
  <div>
    <a href="{{action('OrderController@index')}}">Back to List</a>
  </div>

</div>

@endsection
