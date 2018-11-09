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
    <div class="container-fluid">

        <h1>Create a Souvenir</h1>

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
                <form method="post" enctype="multipart/form-data" action="{{route('souvenir@store')}}">
                    @csrf
                    <div class="form-group">
                        <label  class="control-label">Souvenir Name</label>
                        <input name="name" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label  class="control-label">Description</label>
                        <input name="description" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label  class="control-label">Price</label>
                        <input name="price" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label  class="control-label">Category</label>
                      <select class="form-control" id="category" name="category">
                         <option value="">--Select Category--</option>
                         @foreach($categories as $c)
                         @if ($c->Name == 'MaoriGift')
                         <option selected="selected" value="{{$c->id}}">{{$c->Name}}</option>
                         @else
                         <option value="{{$c->id}}">{{$c->Name}}</option>
                         @endif
                         @endforeach
                       </select>
                    </div>
                    <div class="form-group">
                        <label  class="control-label">Supplier</label>
                        <select class="form-control" id="supplier" name="supplier">
                         <option value="">--Select Supplier--</option>
                         @foreach($suppliers as $s)
                         <option value="{{$s->id}}">{{$s->FirstName." ".$s->LastName}}</option>
                         @endforeach
                       </select>
                    </div>
                    <div class="form-group">
                        <label  class="control-label">Photo</label>
                        <input type="file" name="photo" id="photo" />
                    </div>
                    <div class="form-group">
                        <input type="submit"  class="btn btn-default" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <hr />
    <div>
      <a href="{{action('SupplierController@index')}}">Back to List</a>
    </div>
@endsection
