$(document).ready(function(){
    if (navigator.geolocation){
        browserSupportFlag = true;
        navigator.geolocation.getCurrentPosition(function(pos){
	    myLocation = new google.maps.LatLng(pos.coords.latitude,pos.coords.longitude);
            geocoder = new google.maps.Geocoder();
	    geocoder.geocode({'location':myLocation}, function(result,status){
		country = result[0].address_components[4].short_name;
                console.log(country);
		if(country != 'MX'){
                    $('#state').hide('fast');
                }
            });
        });
    }
});