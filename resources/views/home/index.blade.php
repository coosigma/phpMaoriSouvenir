<?php
/**
 * Created by PhpStorm.
 * User: Coos
 * Date: 2018/11/1
 * Time: 23:17
 */
?>

@extends('Shared._layout')
@section('title', 'Home')
@section('content')
    <div>
    <img id="icon" src="{{url('img/memorial_souvenir.gif')}}" />

        <div class="col-md-12">
            <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="6000">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="active item">
                        <img src="{{url('img/Boat.jpg')}}" alt="Woodcarving boat" class="img-responsive" />
                        <div class="carousel-caption" role="option">
                            <p style="color:black;position:relative;left:350px;top:20px">
                                Woodcarving boat<br />
                                <a class="btn btn-default" href="{{action('SouvenirController@show', ['8'])}}" >Buy Now</a>
                            </p>
                        </div>
                    </div>
                    <div class="item">
                        <img src="{{url('img/Dolls.jpeg')}}" alt="Doll Set" class="img-responsive" />
                        <div class="carousel-caption" role="option">
                            <p style="color:black;position:relative;left:300px">
                                Doll Set<br />
                                <a class="btn btn-default" href="{{action('SouvenirController@show', ['2'])}}" >Buy Now</a>
                            </p>
                        </div>
                    </div>
                    <div class="item">
                        <img src="{{url('img/Jade.jpg')}}" alt="Jade Necklace" class="img-responsive" />
                        <div class="carousel-caption" role="option">
                            <p style="color:black;position:relative;left:200px;top: -30px">
                                Jade Necklace<br />
                                <a class="btn btn-default" href="{{action('SouvenirController@show', ['3'])}}" >Buy Now</a>
                            </p>
                        </div>
                    </div>
                    <div class="item">
                        <img src="{{url('img/PostCard.jpg')}}" alt="Postcard" class="img-responsive" />
                        <div class="carousel-caption" role="option">
                            <p style="color:black;position:relative;left:130px">
                                Postcard
                                <a class="btn btn-default" href="{{action('SouvenirController@show', ['9'])}}" >Buy Now</a>
                            </p>
                        </div>
                    </div>
                </div>
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <br />
        </div>
    </div>
    <br />
    <div class="row-fluid">
        <div class="col-md-3">
            <img src="{{url('img/Jade1.jpg')}}" /><br />
            Jade 1<br />$100<br /><a href="{{action('SouvenirController@show', ['4'])}}">view</a>
        </div>
        <div class="col-md-3">
            <img src="{{url('img/Jade2.jpg')}}" /><br />
            Jade 2<br />$200<br /><a href="{{action('SouvenirController@show', ['5'])}}">view</a>
        </div>
        <div class="col-md-3">
            <img src="{{url('img/Jade3.jpg')}}" /><br />
            Jade 3<br />$300<br /><a href="{{action('SouvenirController@show', ['6'])}}">view</a>
        </div>
        <div class="col-md-3">
            <img src="{{url('img/Jade4.jpg')}}" /><br />
            Jade 4<br />$400<br /><a href="{{action('SouvenirController@show', ['7'])}}">view</a>
        </div>
    </div>
    <br />

@endsection
