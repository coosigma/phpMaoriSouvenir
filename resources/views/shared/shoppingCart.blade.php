<?php
/**
 * Created by PhpStorm.
 * User: Coos
 * Date: 2018/11/8
 * Time: 21:21
 */
?>

<div id="cd-cart" class="container">

    <h2><span class="glyphicon glyphicon glyphicon-shopping-cart"></span> My Cart</h2>
    <hr />
      <div class="row">
        <div class="col-sm-2">
            <h4 class="display-2">Item ID</h4>
        </div>
        <div class="col-sm-3">
            <h4 class="display-2">Souvenir</h4>
        </div>
        <div class="col-sm-3">
            <h4 class="display-2">Category</h4>
        </div>
        <div class="col-sm-2">
            <h4 class="display-2">QTY.</h4>
        </div>
        <div class="col-sm-2">
            <h4 class="display-2">Price</h4>
        </div>
    </div>
      <div class="row" id="cart_items">

    </div>
    <hr />
    <div class="row">
        <div class="col-sm-8"></div>
        <div class="col-sm-2">Sub Total:</div>
        <div class="col-sm-2" id="sub_total">SubTotal</div>
    </div>
    <hr />
    <div class="row">
        <div class="col-sm-8"></div>
        <div class="col-sm-2">Total GST:</div>
        <div class="col-sm-2" id="gst_total">TotalGST</div>
    </div>
    <hr />
      <div class="row">
        <div class="col-sm-8"></div>
        <div class="col-sm-2">Grand Total:</div>

        <div class="col-sm-2" id="grand_total">$0.00</div>

    </div>
    <br />

    <div class="row" id="cart_buttons">
        <div class="col-sm-2"></div>
        <div class="col-sm-5">
            <a onclick="emptyCart()" class="empty-cart-btn">
                Empty Cart <span class="glyphicon glyphicon-remove"></span>
            </a>
        </div>
        <div class="col-sm-5">
            <a href="{{action('CartController@checkOut')}}" class="checkout-btn">
                Checkout<span class="glyphicon glyphicon-step-forward"></span>
            </a>
        </div>
    </div>

</div>
