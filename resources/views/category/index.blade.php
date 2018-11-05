<?php
/**
 * Created by PhpStorm.
 * User: Coos
 * Date: 2018/11/5
 * Time: 14:19
 */
?>

@extends('Shared._layout')
@section('title', 'Categories')
@section('content')
    <div class = "container-fluid">

        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('category') }}">Categories</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('category') }}">View All Categories</a></li>
                <li><a href="{{ URL::to('category/create') }}">Create a Category</a></li>
            </ul>
        </nav>

        <h1>All the Categories</h1>
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
                <td>Name</td>
                <td>Description</td>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $key => $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->Name }}</td>
                    <td>{{ $value->Description }}</td>
                    <!-- we will also add show, edit, and delete buttons -->
                    <td>
                        <a class="btn btn-small btn-success" href="{{ URL::to('category/' . $value->id) }}">Details</a>
                        <a class="btn btn-small btn-info" href="{{ URL::to('category/' . $value->id . '/edit') }}">Edit</a>
                        <a class="btn btn-small btn-danger" href="{{ URL::to('category/' . $value->id . '/delete') }}">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
