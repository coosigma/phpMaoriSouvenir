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
    <h2>Index</h2>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3" style="position:relative;top:0px">
                <ul class="nav navbar-left">
                    <li class="nav-header" style="font-size:22px;padding:20px 20px 20px 20px">
                        Category
                    </li>
                    <li><hr /></li>
                    @php ($paras = Request::except('category'))
                    <li>
                      @php ($paras['category'] = 'MaoriGift')
                      <a href="{{action('SouvenirController@index', $paras)}}">Maroi Gifts</a>
                    </li>
                    <li>
                      @php ($paras['category'] = 'Jewel')
                      <a href="{{action('SouvenirController@index', $paras)}}">Jewels</a>
                    </li>
                    <li>
                      @php ($paras['category'] = 'Craft')
                      <a href="{{action('SouvenirController@index', $paras)}}">Crafts</a>
                    </li>
                    <li>
                      @php ($paras['category'] = 'Art')
                      <a href="{{action('SouvenirController@index', $paras)}}">Arts</a>
                    </li>
                    <li>
                      @php ($paras['category'] = 'Food')
                      <a href="{{action('SouvenirController@index', $paras)}}">Foods</a>
                    </li>
                    <li class="active">
                      @php ($paras['category'] = 'AllCategories')
                      <a href="{{action('SouvenirController@index', $paras)}}">All Categories</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9">
              <h3><a href="{{route('souvenir@create')}}">Create New</a></h3>
                @php ($paras = Request::except('search_str'))
                <form action="{{ action('SouvenirController@index', $paras) }}" method="get">
                    <div class="form-actions no-color">
                        <p>
                            Find by name: <input type="text" name="search_str" value="{{app('request')->input('search_str')}}" />
                            <input type="submit" value="Search" class="btn btn-default" /> |
                            <a href='{{ route('souvenir@index') }}'>Back to Full List</a>
                        </p>
                        <p>
                            Price range: <input type="text" name="lower_price" value="{{app('request')->input('lower_price')}}" onkeyup="value=value.replace(/[^\d.]/g,'')"/>
                            - <input type="text" name="upper_price" value="{{app('request')->input('upper_price')}}" onkeyup="value=value.replace(/[^\d.]/g,'')"/>
                            <input type="submit" value="Filter this Price Range" class="btn btn-default" />
                        </p>
                    </div>
                </form>
                <table class="table">
                    <thead>
                    <tr>
                        <th>
                            Image
                        </th>
                        <th>
                            SouvenirID
                        </th>
                        <th>
                            @if (app('request')->input('sort_mode') == 'name')
                                @php ($sort_name = 'name_desc')
                            @else
                                @php ($sort_name = 'name')
                            @endif
                            @php ($paras = Request::except('sort_mode'))
                            @php ($paras['sort_mode'] = $sort_name)
                            <a href='{{ route('souvenir@index', $paras) }}'>Name</a>
                        </th>
                        <th>
                            @if (app('request')->input('sort_mode') == 'price')
                                @php ($sort_price = 'price_desc')
                            @else
                                @php ($sort_price = 'price')
                            @endif
                            @php ($paras = Request::except('sort_mode'))
                            @php ($paras['sort_mode'] = $sort_price)
                            <a href='{{ route('souvenir@index', $paras) }}'>Price</a>
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            Category
                        </th>
                        <th>
                            Supplier
                        </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--Here we need a model to view data in the database--}}
                    @foreach($souvenirs as $souvenir)
                        <tr>
                            <td>
                                <img style="width: 250px; height: auto;" src="{{$souvenir->PhotoPath}}" alt="Souvenir Image" onerror="this.onerror = null; this.src = '{{$err_photo}}'">
                            </td>
                            <td>
                                {{$souvenir->id}}
                            </td>
                            <td>
                                {{$souvenir->Name}}
                            </td>
                            <td>
                                {{$souvenir->Price}}
                            </td>
                            <td>
                                {{$souvenir->Description}}
                            </td>
                            <td>
                                {{$souvenir->category->Name}}
                            </td>
                            <td>
                                {{$souvenir->supplier->FirstName." ".$souvenir->supplier->LastName}}
                            </td>
                            <td>
                                <a href="Edit" >Edit</a> |
                                <a href="{{route('souvenir@detail',[$souvenir->id])}}" >Details</a> |
                                <a href="Delete" >Delete</a>|
                                <a href="#" onclick='addItem({{$souvenir->id}})'>
                                    Add To <span class="glyphicon glyphicon-shopping-cart"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    {{ $souvenirs->appends(Request::except('page'))->links() }}
              </table>
            </div>
        </div>
    </div>

@endsection
