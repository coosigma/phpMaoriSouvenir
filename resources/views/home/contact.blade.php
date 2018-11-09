<?php
/**
 * Created by PhpStorm.
 * User: Coos
 * Date: 2018/11/2
 * Time: 11:19
 */
?>
@extends('Shared._layout')
@section('title', 'Contact')
@section('content')

<div class="row" style="margin:1.5% 6%;">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Contact us</h3>
                <h6 class="card-subtitle mb-2 text-muted">Quality Souvenir Web shop</h6>
                <address class="card-text">
                    Address: 139 Carrington Rd<br />
                    Mount Albert, Auckland 1025<br />
                    <div>PhoneNumber: 0221234567</div>
                </address>
                <address class="card-text">
                    Open day: Monday - Friday<br />
                    Open Time: 8:30 - 17:00<br />
                </address>
                <address class="card-text">
                    <strong>Support:</strong> <a class="card-link" href="mailto:Support@maorisouvenir.com">Support@maorisouvenir.com</a><br />
                    <strong>Marketing:</strong> <a class="card-link" href="mailto:Marketing@maorisouvenir.com">Marketing@maorisouvenir.com</a>
                </address>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card align-item-center" style="padding:0.75%;">
            <div id="gMap" style="width:100%;height:420px;"></div>
        </div>
    </div>
</div>

<script>
	 function initMap() {
         var center = {lat: -36.881, lng: 174.707};
	     var map = new google.maps.Map(document.getElementById('gMap'), {
		 zoom: 15,
		 center: center
	     });
	     var marker = new google.maps.Marker({
		 position: center,
		 map: map
	     });
	 }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDa31V4QdhR0ofrhuvaNyrv1TIEO49pFOc&callback=initMap"
        type="text/javascript"></script>

@endsection
