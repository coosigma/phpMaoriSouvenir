<?php
/**
 * Created by PhpStorm.
 * User: Coos
 * Date: 2018/11/10
 * Time: 19:38
 */
?>


@extends('Shared._layout')
@section('title', 'Members')
@section('content')

    <div class="container-fluid">


        <h1>{{ $title }}</h1>

        <!-- if there are creation errors, they will show here -->
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

        @php ($member_or_account = ($title == 'Edit Account')? 'account/' : 'member/')
        <form method="post" , action="{{ URL::to($member_or_account . $user->id) }}">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label  class="control-label">User Name</label>
                <input name="name" class="form-control" value="{{$user->name}}" />
            </div>

            <div class="form-group">
                <label  class="control-label">First Name</label>
                <input name="first_name" class="form-control" value="{{$user->FirstName}}" />
            </div>
            <div class="form-group">
                <label  class="control-label">Last Name</label>
                <input name="last_name" class="form-control" value="{{$user->LastName}}" />
            </div>
            <div class="form-group">
                <label  class="control-label">Phone Number</label>
                <input name="phone_number" class="form-control" value="{{$user->PhoneNumber}}" />
            </div>
            <div class="form-group">
                <label  class="control-label">Address</label>
                <input name="address" class="form-control" value="{{$user->Address}}" />
            </div>
            <div class="form-group">
                <input type="submit" value="Save" class="btn btn-default" />
            </div>
        </form>

    </div>

@endsection
