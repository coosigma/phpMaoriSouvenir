<?php
/**
 * Created by PhpStorm.
 * User: Coos
 * Date: 2018/11/5
 * Time: 14:20
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
                <li><a href="{{ URL::to('category') }}">VView All Categories</a></li>
                <li><a href="{{ URL::to('category/create') }}">Create a Category</a>
            </ul>
        </nav>

        <h1>Create a Category</h1>

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
                <form method="post" action="{{action('CategoryController@store')}}">
                    @csrf
                    <div class="form-group">
                        <label  class="control-label">Name</label>
                        <input name="name" class="form-control" />
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
