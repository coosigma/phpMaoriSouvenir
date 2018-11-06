<?php
/**
 * Created by PhpStorm.
 * User: Coos
 * Date: 2018/11/5
 * Time: 14:20
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

        <h1>Create a Supplier</h1>

        <!-- if there are creation errors, they will show here -->
        @if ($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class="row">
            <div class="col-md-4">
                <form method="post" action="{{action('SupplierController@store')}}">
                    @csrf
                    <div class="form-group">
                        <label  class="control-label">First Name</label>
                        <input name="first_name" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label  class="control-label">Last Name</label>
                        <input name="last_name" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label  class="control-label">Phone Number</label>
                        <input name="phone_number" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label  class="control-label">Email</label>
                        <input name="email" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label  class="control-label">Address</label>
                        <input name="address" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label  class="control-label">Description</label>
                        <input name="description" class="form-control" />
                    </div>
                    <div class="form-group">
                        <input type="submit"  class="btn btn-default" />
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
