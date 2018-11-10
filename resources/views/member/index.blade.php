<?php
/**
 * Created by PhpStorm.
 * User: Coos
 * Date: 2018/11/10
 * Time: 17:42
 */
?>

@extends('Shared._layout')
@section('title', 'Members')
@section('content')
    <div class = "container-fluid">


        <h1>All the Members</h1>
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
                <td>User ID</td>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Email</td>
                <td>Email Verified</td>
                <td>Enabled</td>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $key => $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->FirstName }}</td>
                    <td>{{ $value->LastName }}</td>
                    <td>{{ $value->email }}</td>
                    <td>
                      @if($value->email_verified_at == null)
                      No
                      @else
                      Yes
                      @endif
                    </td>
                    <td id="{{'enabled_status_'.$value->id}}">
                      @if($value->Enabled == 0)
                      Yes
                      @else
                      No
                      @endif
                    </td>
                    <!-- we will also add show, edit, and delete buttons -->
                    <td>
                        <a id="{{'enabled_status_'.$value->id}}" class="btn btn-small btn-info" href="#" onclick='changeUserEnabled({{$value->id}})'>
                            @if($value->Enabled == 0)
                                Disable
                            @else
                                Enable
                            @endif
                        </a>
                        <a class="btn btn-small btn-warning" href="{{ URL::to('member/' . $value->id) }}">Details</a>
                        <a class="btn btn-small btn-success" href="{{ URL::to('member/' . $value->id).'/edit' }}">Edit</a>
                        <a class="btn btn-small btn-danger" href="{{ URL::to('member/' . $value->id . '/delete') }}">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
