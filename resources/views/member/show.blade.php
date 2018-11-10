<?php
/**
 * Created by PhpStorm.
 * User: Coos
 * Date: 2018/11/10
 * Time: 19:11
 */
?>

@extends('Shared._layout')
@section('title', 'Members')
@section('content')

    <div class="container-fluid">

        <h1>Showing Member: {{ $user->id }}</h1>

<hr />
    <dl class="dl-horizontal">
        <dt>FirstName</dt>
        <dd>{{$user->FirstName}}</dd>

        <dt>LastName</dt>
        <dd>{{$user->LastName}}</dd>

        <dt>PhoneNumber</dt>
        <dd>{{$user->PhoneNumber}}</dd>

        <dt>Email</dt>
        <dd>{{$user->email}}</dd>

        <dt>Address</dt>
        <dd>{{$user->Address}}</dd>

        <dt>Email Verifed</dt>
        <dd>
          @if($user->email_verified_at == null)
          No
          @else
          Yes
          @endif
        </dd>
        <dt>Enabled</dt>
        <dd>
          @if($user->Enabled == 0)
          Yes
          @else
          No
          @endif
        </dd>

         <dd>
            <table class="table">
                <tr>
                    <th>Order ID</th>
                    <th>Order Date</th>
                    <th>Total Cost</th>
                </tr>
                 @foreach($user->orders as $od)
                <tr>
                  <td>
                    {{$od->id}}
                  </td>
                  <td>
                    {{$od->OrderDate}}
                  </td>
                  <td>
                    {{$od->TotalCost}}
                  </td>
                </tr>
                @endforeach

            </table>
        </dd>
    </dl>
  </div>
  <div>
    <a href="{{action('OrderController@index')}}">Back to List</a>
  </div>

</div>

@endsection
