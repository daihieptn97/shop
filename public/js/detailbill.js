

 function initMap() {
  var directionsService = new google.maps.DirectionsService;
  var directionsDisplay = new google.maps.DirectionsRenderer;
  var map = new google.maps.Map(document.getElementById('bill-map'), {
    zoom: 15,
    center: {lat: 21.587449, lng: 105.812346}
  });
  directionsDisplay.setMap(map);

  calculateAndDisplayRoute(directionsService, directionsDisplay);

}


function calculateAndDisplayRoute(directionsService, directionsDisplay) {
  console.log(origin_bill + " " + destination_bill);
  directionsService.route({
    origin: origin_bill,
    destination: destination_bill,
    travelMode: 'DRIVING'
  }, function(response, status) {
    if (status === 'OK') {
      directionsDisplay.setDirections(response);
    } else {
       window.alert('Yêu cầu chỉ đường không thành công do ' + status);
    }
  });
}



$('.nav-bill-detail').click(function () {
  $('.active').removeClass('active');
  $(this).addClass('active');

  activeTabDetail();
  
});

function  activeTabDetail() {
  var arr = document.getElementsByClassName('details-bill');
  for (var i = 0; i < arr.length; i++) {
     if(arr[i].className.indexOf('bill-active') < 0 ){
               if(arr[i].className  == 'bill-map animated bounce details-bill'){
                  initMap();
                }
                arr[i].classList.add("bill-active");
            }else{
                arr[i].classList.remove("bill-active");
            }
  }
}