<?php
/**
 * Created by PhpStorm.
 * User: Coos
 * Date: 2018/11/5
 * Time: 14:19
 */
?>

@extends('Shared._layout')
@section('title', 'Place your Order')
@section('content')

<h3>Please Fill in the Order Details</h3>

<!-- if there are creation errors, they will show here -->
        @if ($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class="row">
          <form method="post" action="{{action('OrderController@store')}}">
            @csrf
            <div class="form-horizontal">
              <hr />

              <div class="form-group">
                <label  class="col-md-2 control-label">First Name</label>
                <div class="col-md-10">
                  <input name="first_name" class="form-control" />
                </div>
              </div>

              <div class="form-group">
                <label  class="col-md-2 control-label">Last Name</label>
                <div class="col-md-10">
                  <input name="last_name" class="form-control" />
                </div>
              </div>

              <div class="form-group">
                <label  class="col-md-2 control-label">Phone Number</label>
                <div class="col-md-10">
                  <input name="phone_number" class="form-control" />
                </div>
              </div>

              <div class="form-group">
                <label  class="col-md-2 control-label">Address</label>
                <div class="col-md-10">
                  <input name="address" class="form-control" />
                </div>
              </div>

              <div class="form-group">
                <label  class="col-md-2 control-label">City</label>
                <div class="col-md-10">
                  <input name="city" class="form-control" />
                </div>
              </div>

              <div class="form-group">
                <label  class="col-md-2 control-label">State</label>
                <div class="col-md-10">
                  <input name="state" class="form-control" />
                </div>
              </div>

              <div class="form-group">
                <label  class="col-md-2 control-label">Country</label>
                <div class="col-md-10">
                  <input name="country" class="form-control" />
                </div>
              </div>

              <div class="form-group">
                <label  class="col-md-2 control-label">Postal Code</label>
                <div class="col-md-10">
                  <input name="postal_code" class="form-control" />
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-offset-3 col-md-10">
                  <button type="submit" class="btn btn-default btn-lg">
                    Place Order <span class="glyphicon glyphicon-fast-forward"></span>
                  </button>
                </div>
              </div>

          </form>
        </div>

@endsection
