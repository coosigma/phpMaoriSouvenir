<?php
/**
 * Created by PhpStorm.
 * User: Coos
 * Date: 2018/11/5
 * Time: 14:21
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

        <h1>Edit {{ $category->Name }}</h1>

        <!-- if there are creation errors, they will show here -->
        @if ($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method="post" , action="{{ URL::to('category/' . $category->id) }}">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label  class="control-label">Name</label>
                <input name="name" class="form-control" value="{{$category->Name}}"/>
            </div>
            <div class="form-group">
                <label  class="control-label">Description</label>
                <input name="description" class="form-control" value="{{$category->Description}}" />
            </div>
            <div class="form-group">
                <input type="submit" value="Save" class="btn btn-default" />
            </div>
        </form>

    </div>

@endsection
