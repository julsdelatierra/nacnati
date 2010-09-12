$(document).ready(function(){
    if (navigator.geolocation){
        browserSupportFlag = true;
        navigator.geolocation.getCurrentPosition(function(pos){
	    myLocation = new google.maps.LatLng(pos.coords.latitude,pos.coords.longitude);
            geocoder = new google.maps.Geocoder();
	    geocoder.geocode({'location':myLocation}, function(result,status){
		country = result[0].address_components[4];
                console.log(country.short_name);
		if(country.short_name != 'MX'){
                    $('#fila_estado').hide('fast');
                }
                else{
                    $('#pais').val(country.long_name);
                }
            });
        });
    }
});