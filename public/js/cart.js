function initialize() {
    var input = document.getElementById('address');
    var autocomplete = new google.maps.places.Autocomplete(input);
}

$(document).ready(function(){

	$("#confirm-address").on('click', function() {
		var addr = $("#address").val();
		var add_shop = $("#address-shop").val();
		$.ajax({
	        url: base_url + '/user/getDistance/'+addr+'/'+add_shop,
	        type : "get",
	        dataType:"text",
	        success : function (result){
	        	$.getJSON(base_url+"/js/config.json", function(data) {    
					var lastindex = result.indexOf(" km");
		        	var km = result.substring(0, lastindex);
		        	km = km.replace(',','');
		        	
		        	console.log(km);
		        	var total_km = km;
		        	var ship = 0;
		        	data.forEach(function(element,index) {
		        		console.log(ship+"|"+total_km);
		        		if(total_km > 0){
	        				if(total_km - element.km >= 0){
			        			if(element.km == ""){
			        				ship += total_km * element.price;
			        				total_km = 0;
				        		}
				        		else{
				        			ship += element.km * element.price;
				        			total_km -= element.km;
				        		}
						  	}
						  	else{
						  		ship += total_km * element.price;
						  		total_km = 0;
						  	}
					  	}
					});

		        	ship = Math.ceil(ship);
		        	console.log(ship);

		        	var pay_temp = parseInt($("#payment-temp").text());
		        	$("#shipping").val(ship);
		        	$("#view-ship").html(ship);
		        	$("#payment").html(ship+pay_temp);
		        	$("#payment").html(ship+pay_temp);
				});
	        }
	    });
	});

	$('#pay').click(function () {
		var arr = document.getElementsByClassName('Obligatory');
		if(checkEmptyInput(arr) ){
			var datas = [
				{ 'productID' :  document.getElementsByClassName('productID')[0].value ,
				'number' :  document.getElementsByClassName('numberphone')[0].value,
				'email' : document.getElementsByClassName('email')[0].value,
				'name' : document.getElementsByClassName('name')[0].value,
				'address' : document.getElementsByClassName('address')[0].value,
				'totalPrice' : document.getElementsByClassName('many_product_price')[2].textContent,
				'numberProduct' : document.getElementsByClassName('numberproduct')[0].value,
				'shipping' : document.getElementsByClassName('shipping')[0].value,
				},
			];

			// console.log(a);
			$.ajax({
				url: base_url + '/user/cart',
				type: 'POST',
				headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    },
				data: { 
						value: datas 
					},
				success : function (result){
					console.log(result);
                	if (result != "false") {
                		alert("Đặt hàng thành công");
                		window.location = base_url + '/user/order/'+result;
                	}else {
                		alert("Đặt hàng chưa thành công");
                	}
                }
			});
		} else alert('Yêu cầu nhập đủ các ô dữ liệu để đảm bảo lợi ích cho bạn');
	});
	var sum  =  1 *  parseInt(document.getElementById('productprice').textContent);
	// console.log(sum);
	setSumCart(sum);


	$('.numberproduct').change(function () {
		//alert("message?: DOMString");
		var sum  =  parseInt(this.value) *  parseInt(document.getElementById('productprice').textContent);
		console.log(sum);
		setSumCart(sum);
	});

	function setSumCart(total){
		var htmlTotal = document.getElementsByClassName('many_product_price');
		for (var i = 0; i < htmlTotal.length; i++) {
			htmlTotal[i].innerHTML = total;
		}
	}

	function checkEmptyInput(arr){
		for (var i = 0; i < arr.length; i++) {
			if(arr[i].value.trim().length <= 0  ) return false;
		}
		return true;
	}
});
