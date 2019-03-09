function initialize() {
  var inputa = document.getElementById('location');
  var inputb = document.getElementById('location-2');

  
  var options = {
    types: ['geocode'], //this should work !
    componentRestrictions: {country: "ng"}
  };
  
  var autocomplete_a = new google.maps.places.Autocomplete(inputa, options);
  var autocomplete_b = new google.maps.places.Autocomplete(inputb, options);
}
google.maps.event.addDomListener(window, 'load', initialize);