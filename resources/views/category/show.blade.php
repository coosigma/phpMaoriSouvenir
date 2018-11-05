<?php
/**
 * Created by PhpStorm.
 * User: Coos
 * Date: 2018/11/5
 * Time: 18:24
 */
?>


@extends('Shared._layout')
@section('title', 'Categories')
@section('content')

    <div class="container-fluid">

        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('category') }}">Categories</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('category') }}">View All Categories</a></li>
                <li><a href="{{ URL::to('category/create') }}">Create a Category</a>
            </ul>
        </nav>

        <h1>Showing {{ $category->Name }}</h1>

        <div class="jumbotron text-center">
            <h2>{{ $category->Name }}</h2>
            <p>
                <strong>ID:</strong> {{ $category->id }}<br>
                <strong>Description:</strong> {{ $category->Description }}
            </p>
        </div>
        <div>
            <a href="{{action('CategoryController@index')}}">Back to List</a>
        </div>

    </div>

@endsection
