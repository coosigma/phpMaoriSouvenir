<?php
/**
 * Created by PhpStorm.
 * User: Coos
 * Date: 2018/11/1
 * Time: 23:17
 */
?>

@extends('Shared._layout')
@section('title', 'Home Page')
@section('content')
    <div>
    <img id="icon" src="{{asset('public/img/memoraial_souvenir.gif')}}" />

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
                        <img src="public/img/Boat.jpg" alt="Woodcarving boat" class="img-responsive" />
                        <div class="carousel-caption" role="option">
                            <p style="color:black;position:relative;left:350px;top:20px">
                                Woodcarving boat<br />
                                {{--@*<a class="btn btn-default" style="position:relative;left:50px;top:20px" asp-controller="Souvenirs" asp-action="Details" asp-route-id="23">Buy Now</a>*@--}}
                                {{--<a asp-controller="@ViewData["UserSouvenirPage"]" asp-action="Details" asp-route-id="8" class="btn btn-default">Buy Now</a>--}}
                            </p>
                        </div>
                    </div>
                    <div class="item">
                        <img src="public/img/Dolls.jpeg" alt="Doll Set" class="img-responsive" />
                        <div class="carousel-caption" role="option">
                            <p style="color:black;position:relative;left:300px">
                                Doll Set<br />
                                {{--<a asp-controller="@ViewData["UserSouvenirPage"]" asp-action="Details" asp-route-id="2" class="btn btn-default">Buy Now</a>--}}
                            </p>
                        </div>
                    </div>
                    <div class="item">
                        <img src="public/img/Jade.jpg" alt="Jade Necklace" class="img-responsive" />
                        <div class="carousel-caption" role="option">
                            <p style="color:black;position:relative;left:200px;top: -30px">
                                Jade Necklace<br />
                                {{--<a asp-controller="@ViewData["UserSouvenirPage"]" asp-action="Details" asp-route-id="3" class="btn btn-default">Buy Now</a>--}}
                            </p>
                        </div>
                    </div>
                    <div class="item">
                        <img src="public/img/PostCard.jpg" alt="Postcard" class="img-responsive" />
                        <div class="carousel-caption" role="option">
                            <p style="color:black;position:relative;left:130px">
                                Postcard
                                {{--<a asp-controller="@ViewData["UserSouvenirPage"]" asp-action="Details" asp-route-id="9" class="btn btn-default">Buy Now</a>--}}
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
            <img src="public/img/Jade1.jpg" /><br />
            Jade 1<br />$100<br />{{--<a asp-controller="@ViewData["UserSouvenirPage"]" asp-action="Details" asp-route-id="4">view</a>--}}
        </div>
        <div class="col-md-3">
            <img src="public/img/Jade2.jpg" /><br />
            Jade 2<br />$200<br />{{--<a asp-controller="@ViewData["UserSouvenirPage"]" asp-action="Details" asp-route-id="5">view</a>--}}
        </div>
        <div class="col-md-3">
            <img src="public/img/Jade3.jpg" /><br />
            Jade 3<br />$300<br />{{--<a asp-controller="@ViewData["UserSouvenirPage"]" asp-action="Details" asp-route-id="6">view</a>--}}
        </div>
        <div class="col-md-3">
            <img src="public/img/Jade4.jpg" /><br />
            Jade 4<br />$400<br />{{--<a asp-controller="@ViewData["UserSouvenirPage"]" asp-action="Details" asp-route-id="7">view</a>--}}
        </div>
    </div>
    <br />

@endsection
