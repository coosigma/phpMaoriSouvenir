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

// For shopping cart
function addItem(id) {
    $.ajax({
    type: 'post',
    url: '/cart/addItem',
    data: {"id" : id},
    success: function (res){
      // console.log("sucess");
      // console.log(res.message);
      // console.log(res.data);
    },
    });
}

// Write your JavaScript code.
function reduceOne(id) {
		$.ajax({
    type: 'get',
    url: '/cart/reduceItem/'+id,
    success: function (res){
			refreshCart(res);
	  },
    });
}
function emptyCart() {
		$.ajax({
    type: 'get',
    url: '/cart/emptyCart',
    success: function (res){
			refreshCart(res);
	  },
    });
}
function refreshCart(res) {
				var new_string = "";
				for (i = 0, len = res.data.length; i < len; i++) {
					var item = res.data[i];
          console.log(res);

	        new_string += '<hr /><div class="row">';
	        // item's id
	        new_string += '<div class="col-sm-2">' +
	            '<a href="souvenir/' + item.id + '">' + item.id + '</a></div>';
	        // item's name
	        new_string += '<div class="col-sm-3">' +
	            '<a href="souvenir/' + item.id + '">' + item.name + '</a></div>';
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
