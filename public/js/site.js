//For default ajax
$(document).ready(function(){
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },
      error: function(xhr, status, error){
        console.log("error");
        alert(error);
      }
  });
})

// For order
function changeOrderStatus(id){
  var url = $('meta[name="my_url"]').attr('content');
    $.ajax({
    type: 'post',
    url: url+ '/order/changeOrderStatus',
    data: {"id" : id},
    success: function (res){
      $("#order_status_"+id).html(res.data.status);
      $("#change_button_"+id).html(res.data.button);
    },
  });
}

// For user
function getCart() {
  var url = $('meta[name="my_url"]').attr('content');
  $.ajax({
    type: 'get',
    url: url+'/cart/getCart',
    success: function (res){
      refreshCart(res);
    },
  });
}


function changeUserEnabled(id){
    var url = $('meta[name="my_url"]').attr('content');
    $.ajax({
    type: 'post',
    url: url+ '/member/changeUserEnabled',
    data: {"id" : id},
    success: function (res){
      $("#enabled_status_"+id).html(res.data.status);
      $("#enabled_button_"+id).html(res.data.button);
    },
  });
}


// For shopping cart
function addItem(id) {
    var url = $('meta[name="my_url"]').attr('content');
    $.ajax({
    type: 'post',
    url: url+ '/cart/addItem',
    data: {"id" : id},
    success: function (res){
    },
    });
}

// Write your JavaScript code.
function reduceOne(id) {
    var url = $('meta[name="my_url"]').attr('content');
		$.ajax({
    type: 'get',
    url: url+ '/cart/reduceItem/'+id,
    success: function (res){
			refreshCart(res);
	  },
    });
}
function emptyCart() {
    var url = $('meta[name="my_url"]').attr('content');
		$.ajax({
    type: 'get',
    url: url+ '/cart/emptyCart',
    success: function (res){
			refreshCart(res);
	  },
    });
}
function refreshCart(res) {
  var url = $('meta[name="my_url"]').attr('content');
				var new_string = "";
				for (i = 0, len = res.data.length; i < len; i++) {
					var item = res.data[i];

	        new_string += '<hr /><div class="row">';
	        // item's id
	        new_string += '<div class="col-sm-2">' +
	            '<a href="'+url+'/souvenir/' + item.id + '">' + item.id + '</a></div>';
	        // item's name
	        new_string += '<div class="col-sm-3">' +
	            '<a href="'+url+'/souvenir/' + item.id + '">' + item.name + '</a></div>';
				  // category's name
	        new_string += '<div class="col-sm-3">' + item.attributes.category + '</div>';
	        // item's quantity
	        new_string += '<div class="col-sm-2">' + item.quantity +
						 ' <a onclick="reduceOne(' + item.id +')"><span class="glyphicon glyphicon-remove-circle"></span></a></div>';
	        // item's price
	        new_string += '<div class="col-sm-2">' + item.price.toFixed(2) +'</div></div>';
				}
    $("#cart_items").html(new_string);
    $("#sub_total").html("$" + res.sub);
    $("#gst_total").html("$" + res.gst);
    $("#grand_total").html("$" + res.total);
    var url = window.location.href;
    if (res.data.length == 0 || url.indexOf("cart/checkOut") != -1) {
        $("#cart_buttons").hide();
    } else {
        $("#cart_buttons").show();
    }
}
