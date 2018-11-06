<?php
/**
 * Created by PhpStorm.
 * User: Coos
 * Date: 2018/11/5
 * Time: 14:19
 */
?>

@extends('Shared._layout')
@section('title', 'Suppliers')
@section('content')
    <div class = "container-fluid">

        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('supplier') }}">Suppliers</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('supplier') }}">View All Suppliers</a></li>
                <li><a href="{{ URL::to('supplier/create') }}">Create a Supplier</a></li>
            </ul>
        </nav>

        <h1>All the Suppliers</h1>
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
                <td>ID</td>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Description</td>
                <td>PhoneNumber</td>
                <td>Address</td>
                <td>Email</td>
            </tr>
            </thead>
            <tbody>
            @foreach($suppliers as $key => $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->FirstName }}</td>
                    <td>{{ $value->LastName }}</td>
                    <td>{{ $value->Description }}</td>
                    <td>{{ $value->PhoneNumber}}</td>
                    <td>{{ $value->Address }}</td>
                    <td>{{ $value->Email }}</td>
                    <!-- we will also add show, edit, and delete buttons -->
                    <td>
                        <a class="btn btn-small btn-success" href="{{ URL::to('supplier/' . $value->id) }}">Details</a>
                        <a class="btn btn-small btn-info" href="{{ URL::to('supplier/' . $value->id . '/edit') }}">Edit</a>
                        <a class="btn btn-small btn-danger" href="{{ URL::to('supplier/' . $value->id . '/delete') }}">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
