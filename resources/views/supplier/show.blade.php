<?php
/**
 * Created by PhpStorm.
 * User: Coos
 * Date: 2018/11/5
 * Time: 18:24
 */
?>


@extends('Shared._layout')
@section('title', 'Suppliers')
@section('content')

    <div class="container-fluid">

        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('supplier') }}">Suppliers</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('supplier') }}">View All Suppliers</a></li>
                <li><a href="{{ URL::to('supplier/create') }}">Create a Supplier</a>
            </ul>
        </nav>

        <h1>Showing {{ $supplier->FirstName." ".$supplier->LastName }}</h1>

        <div class="jumbotron text-center">
          <h2>{{ $supplier->FirstName." ".$supplier->LastName }}</h2>
          <p>
            <strong>ID:</strong> {{ $supplier->id }}<br>
            <strong>First Name:</strong> {{ $supplier->FirstName }}<br>
            <strong>Last Name:</strong> {{ $supplier->LastName }}<br>
            <strong>Phone Number:</strong> {{ $supplier->PhoneNumber }}<br>
            <strong>Email:</strong> {{ $supplier->Email }}<br>
            <strong>Address:</strong> {{ $supplier->Address }}<br>
            <strong>Description:</strong> {{ $supplier->Description }}
          </p>
        </div>
        <div>
            <a href="{{action('SupplierController@index')}}">Back to List</a>
        </div>

    </div>

@endsection
