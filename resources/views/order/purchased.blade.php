<?php
/**
* Created by PhpStorm.
* User: Coos
* Date: 2018/11/5
* Time: 14:19
*/
?>

@extends('Shared._layout')
@section('title', 'Thank you for your purchase')
@section('content')
<h2><span class="glyphicon glyphicon-saved"></span>Thank you For Your Purchase!</h2>

<div>
    <h4>The following order will be dispatched as per the details below.</h4>
    <hr />
    <dl class="dl-horizontal">
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
        <dd>{{$order->OrderDate->format('Y-m-d H:i:s')}}</dd>

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

      </div>
@endsection
