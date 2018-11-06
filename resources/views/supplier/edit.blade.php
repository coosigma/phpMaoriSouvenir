<?php
/**
 * Created by PhpStorm.
 * User: Coos
 * Date: 2018/11/5
 * Time: 14:21
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

        <h1>Edit {{ $supplier->FirstName." ".$supplier->LastName }}</h1>

        <!-- if there are creation errors, they will show here -->
        @if ($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method="post" , action="{{ URL::to('supplier/' . $supplier->id) }}">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label  class="control-label">First Name</label>
                <input name="first_name" class="form-control" value="{{$supplier->FirstName}}" />
            </div>
            <div class="form-group">
                <label  class="control-label">Last Name</label>
                <input name="last_name" class="form-control" value="{{$supplier->LastName}}" />
            </div>
            <div class="form-group">
                <label  class="control-label">Phone Number</label>
                <input name="phone_number" class="form-control" value="{{$supplier->PhoneNumber}}" />
            </div>
            <div class="form-group">
                <label  class="control-label">Email</label>
                <input name="email" class="form-control" value="{{$supplier->Email}}" />
            </div>
            <div class="form-group">
                <label  class="control-label">Address</label>
                <input name="address" class="form-control" value="{{$supplier->Address}}" />
            </div>
            <div class="form-group">
                <label  class="control-label">Description</label>
                <input name="description" class="form-control" value="{{$supplier->Description}}" />
            </div>
            <div class="form-group">
                <input type="submit" value="Save" class="btn btn-default" />
            </div>
        </form>

    </div>

@endsection
