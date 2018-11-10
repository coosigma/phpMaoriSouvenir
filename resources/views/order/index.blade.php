<?php
/**
 * Created by PhpStorm.
 * User: Coos
 * Date: 2018/11/10
 * Time: 15:05
 */
?>

@extends('Shared._layout')
@section('title', 'Orders')
@section('content')
    <div class = "container-fluid">


        <h1>All the Orders</h1>
        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        @if ($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <td>Order ID</td>
                <td>First Name</td>
                <td>Last Name</td>
                <td>PhoneNumber</td>
                <td>Email</td>
                <td>OrderDate</td>
                <td>Status</td>
                <td>TotalCost</td>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $key => $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->FirstName }}</td>
                    <td>{{ $value->LastName }}</td>
                    <td>{{ $value->PhoneNumber}}</td>
                    <td>{{ $value->user->email }}</td>
                    <td>{{ $value->OrderDate }}</td>
                    <td id="{{'order_status_'.$value->id}}" >
                      @if($value->Status == 0)
                            Waiting
                        @else
                            Shipped
                        @endif
                    </td>
                    <td>{{ $value->TotalCost }}</td>
                    <!-- we will also add show, edit, and delete buttons -->
                    <td>
                      <?php if (Auth::check() && Auth::user()->type == 'admin'): ?>
                        <a id="{{'change_button_'.$value->id}}" class="btn btn-small btn-info" href="#" onclick='changeOrderStatus({{$value->id}})'>
                            @if($value->Status == 0)
                                Ship
                            @else
                                Wait
                            @endif
                        </a>
                        <?php endif; ?>

                        <a class="btn btn-small btn-success" href="{{ URL::to('order/' . $value->id) }}">Details</a>
                        <?php if (Auth::check() && Auth::user()->type == 'admin'): ?>
                          <a class="btn btn-small btn-danger" href="{{ URL::to('order/' . $value->id . '/delete') }}">Delete</a>
                        <?php endif; ?>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
