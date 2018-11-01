<?php
/**
 * Created by PhpStorm.
 * User: Coos
 * Date: 2018/11/1
 * Time: 23:17
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')- CarSupplier</title>
    <link rel="stylesheet" href="{{url('lib/bootstrap/dist/css/bootstrap.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{url('css/site.css')}}" type="text/css"/>
</head>
<body>
<div style="font-size:15px" class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="col-xs-12 col-md-9 col-lg-9    collapse navbar-collapse">
        <div class="col-xs-6 col-md-3 col-lg-3  navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="{{url('/index')}}">Home</a></li>
                <li><a href="{{url('/Cars')}}">Car</a></li>
                <li><a href="{{url('/Suppliers')}}">Suppliers</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container body-content">
    @yield('content')
    <hr />
    <div class="container">
        <footer class="footer">
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <p><a href="{{url('/index')}}"><span class="glyphicon glyphicon-home"> </span>  Home</a></p>
                    <p><a href="{{url('/Cars')}}">Car</a></p>
                    <p><a href="{{url('/Suppliers')}}">Suppliers</a></p>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="{{url('lib/jquery/dist/jquery.js')}}"></script>
<script src="{{url('lib/bootstrap/dist/js/bootstrap.js')}}"></script>
<script src="{{url('js/site.js')}}"></script>
</body>
</html>
