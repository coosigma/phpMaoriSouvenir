<?php
/**
 * Created by PhpStorm.
 * User: Coos
 * Date: 2018/11/2
 * Time: 13:07
 */
?>

@extends('Shared._layout')
@section('title', 'Souvenir')
@section('content')
  <h1>Showing {{ $souvenir->Name }}</h1>

        <div class="jumbotron text-center">
            <h2>{{ $souvenir->Name }}</h2>
            <div>
              <img style="width: auto; height: auto;" src="{{url($souvenir->PhotoPath)}}" alt="Souvenir Image" onerror="this.onerror = null; this.src = '{{$err_photo}}'">
            </div>
            <p>
                <strong>ID:</strong> {{ $souvenir->id }}<br>
                <strong>Name:</strong>{{$souvenir->Name}} <br>
                <strong>Description:</strong>{{$souvenir->Description}} <br>
                <strong>Price:</strong>{{$souvenir->Price}} <br>
                <strong>Category:</strong>{{$souvenir->category->Name}} <br>
                <strong>Supplier:</strong>{{$souvenir->supplier->FirstName." ".$souvenir->supplier->LastName}} <br>
            </p>
        </div>
        <div>
            <a href="{{action('SupplierController@index')}}">Back to List</a>
        </div>

@endsection
