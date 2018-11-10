<?php
/**
 * Created by PhpStorm.
 * User: Coos
 * Date: 2018/11/1
 * Time: 23:18
 */
?>

        <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')- QualitySouvenir</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    {{--<link rel="stylesheet" href="{{url('lib/bootstrap/dist/css/bootstrap.css')}}" type="text/css" />--}}
    <link rel="stylesheet" href="{{url('css/site.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{url('css/style.css')}}" type="text/css"/>
    <link rel="shortcut icon" href="{{url('img/favicon.ico')}}" type="image/x-icon" />
    <link rel="bookmark" href="{{url('img/favicon.ico')}}" type="image/x-icon" />
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href='{{ route('home@index') }}' class="navbar-brand">
                <img id="icon" src="{{asset('img/QualitySouvenir.png')}}" />
            </a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav" style="font-size: 18px">
                <li><a  href='{{ route('home@index') }}'><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>

                <?php if (Auth::check() && Auth::user()->type == 'admin'): ?>
                  <li><a  href='{{ action('MemberController@index') }}'><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Members</a></li>
                  <li><a  href='{{ action('CategoryController@index') }}'><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Categories</a></li>
                  <li><a  href='{{ action('SupplierController@index') }}'><span class="glyphicon glyphicon-oil" aria-hidden="true"></span> Suppliers</a></li>
                <?php endif; ?>

                <?php if (Auth::check()): ?>
                  <li><a  href='{{ action('OrderController@index') }}'><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Orders</a></li>
                <?php endif; ?>

                <li><a  href='{{ route('souvenir@index') }}'><span class="glyphicon glyphicon-gift" aria-hidden="true"></span> Souvenirs</a></li>
                <li><a  href='{{ route('home@about') }}'><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> About</a></li>
                <li><a  href='{{ route('home@contact') }}'><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> Contact</a></li>
              </ul>

            <ul class="nav navbar-nav navbar-right">
                @guest()
                        <li><a href="{{url('register')}}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Register</a></li>
                        <li><a href="{{url('login')}}"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Log in</a></li>
                @endguest
                @auth()
                        <li><a href="{{url('account')}}"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> {{Auth::user()->email}}</a></li>
                        <li><a href="{{url('logout')}}"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Log out</a></li>
                @endauth
            </ul>

        </div>
    </div>
</nav>
<br />
<br />
<br />
<div class="container body-content">
    @yield('content')

    <?php if (!Auth::check() || Auth::user()->type != 'admin'): ?>
    <div id="cd-cart-trigger"><a class="cd-img-replace" href="/#0">Cart</a></div>
    <div id="cd-shadow-layer"></div>
    @include('shared.ShoppingCart')
    <?php endif; ?>

    <hr />
    <div class="container">
        <footer class="bg-light" style="margin:20px -15px -15px -15px;">
            <div class="container">
                <div class="row text-muted">
                    <div class="col-md-3">
                        <h5>Website Map</h5>
                        <hr />
                        <ul class="alert-light list-unstyled bg-light">
                            <li><a href='{{ route('home@index') }}'><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
{{--                            <li><a href='{{ route('souvenir@index'}}')><span class="glyphicon glyphicon-gift" aria-hidden="true"></span> Souvenirs</a></li>--}}
                            <li><a href='{{ route('souvenir@index') }}'><span class="glyphicon glyphicon-gift" aria-hidden="true"></span> Souvenirs</a></li>
                            <li><a href='{{ route('home@about') }}'><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> About</a></li>
                            <li><a href='{{ route('home@contact') }}'><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> Contact</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h5>About Author</h5>
                        <hr />
                        <ul class="alert-light list-unstyled bg-light">
                            <li><span class="glyphicon glyphicon-user"> </span> Bing Liang</li>
                            <li><span class="glyphicon glyphicon-info-sign"></span> ID: 1487191</li>
                            <li><span class="glyphicon glyphicon-education"></span> GD in Computing</li>
                            <li><span class="glyphicon glyphicon-calendar"></span> ISCG 7420</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h5>About Website</h5>
                        <hr />
                        <ul class="alert-light list-unstyled bg-light">
                            <li><span class="glyphicon glyphicon glyphicon-globe"></span> 183 Bld, 139 Carrington Rd, Mt Albert, Auckland, NZ</li>
                            <li><span class="glyphicon glyphicon-phone-alt"></span> 0211234567</li>
                            <li><span class="glyphicon glyphicon-envelope"></span> support@maorisouvenir.com</li>
                            <li>&copy; All rights reserved by Bing Liang <img id="icon" src="{{asset('img/HomeIcon-Black.png')}}" /></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="{{url('lib/jquery/dist/jquery.js')}}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
{{--<script src="{{url('lib/bootstrap/dist/js/bootstrap.js')}}"></script>--}}
<script src="{{url('js/site.js')}}"></script>
<script src="{{url('js/main.js')}}"></script>
</body>
</html>
