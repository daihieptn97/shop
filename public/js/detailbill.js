

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


$('#map-bill-detail').click(function(event) {
    $(this).addClass('active');
    $('#bill-map').addClass('active');


    $('#bill-info').removeClass('active');
    $('#info-bill-detail').removeClass('active');
});


$('#info-bill-detail').click(function(event) {
    $(this).addClass('active');
    $('#bill-info').addClass('active');

    $('#bill-map').removeClass('active');
    $('#map-bill-detail').removeClass('active');
});